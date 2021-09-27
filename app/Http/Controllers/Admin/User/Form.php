<?php

namespace App\Http\Controllers\Admin\User;

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

        $form['password'] = FormF::password('password', $opt, $data['password'] ?? '');
        // ↑$optと$data['password'] ?? ''の順番を入れ替えたら表示できる。
        $form['type'] = SimpleForm::radio('type', $data['type']??'', __('define.user.type'), [] );

        $form['icon_url'] = FormF::input('file', 'icon_url', $data['icon_url'] ?? '', $opt);
        // $form['icon_url'] = FormF::input('file', $data['icon_url']);
        return $form;
    }

    public function build(array $data = []): array
    {
        return $this->buildRegist($data);
    }

    public function getRule(array $data = []): array
    {
        return $this->getRuleRegist($data);
    }

    public function getRuleRegist(array $data = []): array //フォーム入力のルール
    {
        $rule = [];
        $rule['name'] = ['required', 'max:20'];
        $rule['email'] = ['required','unique:users', 'max:30'];
        $rule['password'] = ['required', 'min:8','max:20']; //8文字以上、20文字未満
        //$rule['type'] = ['required', 'integer' ]; //ここはいらない場合、コメントアウト
        $rule['icon_url'] = ['nullable','file','mimes:jpeg,png,jpg,bmb','max:2048'];

        return $rule;
    }

    /**
     * フォームの値のHTMLを生成する
     * @param array $data
     * @return void
     */
    public function getHtml( array $data = [] ) {
        
        $data['icon_url'] = url($data['icon_url']);
        
        return $data;
    }
}

