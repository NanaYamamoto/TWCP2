<?php

namespace App\Http\Controllers\Admin\Administrator;

use App\Http\TakemiLibs\SimpleForm;
use App\Http\TakemiLibs\InterfaceForm;
use \Form as FormF;

class Form implements InterfaceForm
{
    public function buildRegist(array $data = []): array
    {
        $form = [];
        $opt = ['class' => 'form-control', 'autocomplete' => 'off'];

        $form['name'] = FormF::text('name', $data['name'] ?? '', $opt);

        $form['email'] = FormF::email('email', $data['email'] ?? '', $opt);

        $form['password'] = FormF::password('password', $opt);
        // ↑$optと$data['password'] ?? ''の順番を入れ替えたら表示できる。
        $form['type'] = SimpleForm::radio('type', $data['type'] ?? '', __('define.user.type'), []);
        $form['icon_url'] = FormF::input('file', 'icon_url', $data['icon_url'] ?? '', $opt);
        return $form;
    }

    public function build(array $data = []): array
    {
        return $this->buildRegist($data);
    }

    public function getRule(array $data = []): array
    {
        $rule = $this->getRuleRegist($data);

        $rule['password'] = ['nullable', 'min:8', 'max:20'];
        $rule['email'] = ['required', "unique:users,email,{$data['id']},id", 'max:30'];
        return $rule;
    }

    public function getRuleRegist(array $data = []): array
    {
        $rule = [];
        $rule['name'] = ['required', 'max:20'];
        $rule['email'] = ['required', 'unique:users,email', 'max:30']; //uniqueで同じものがあれば「既に使用されています」と表示する場合、unique:テーブル名
        $rule['password'] = ['required', 'min:8', 'max:20']; //8文字以上、20文字未満
        //$rule['type'] = ['required', 'integer' ]; //ここはいらない場合、コメントアウト
        if (!empty($data['icon_url'])) {
            $rule['icon_url'] = ['nullable', 'file', 'mimes:jpeg,png,jpg,bmb', 'max:2048'];
        } else {
            $data['icon_url'] = '';
        }
        $rule['icon_url'] = ['nullable', 'file', 'mimes:jpeg,png,jpg,bmb', 'max:2048'];
        // $rule['icon_url'] = ['nullable','image','mimes:jpeg,png,jpg,bmb','max:2048'];

        return $rule;
    }

    /**
     * フォームの値のHTMLを生成する
     * @param array $data
     * @return void
     */
    public function getHtml(array $data = [])
    {

        $data['icon_url'] = url($data['icon_url']);



        return $data;
    }
}
