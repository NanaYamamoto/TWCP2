<?php

namespace App\Http\Controllers\Operate\Administrator;

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

        $form['type'] = SimpleForm::radio('type', $data['type'] ?? '', __('define.user.type'), []);
        $form['icon_url'] = FormF::file('icon_url', $opt);
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
        $rule['icon_url'] = ['file', 'mimes:jpeg,png,jpg,bmb', 'max:2048'];
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
        $data['name'] = "<pre>{$data['name']}<pre>";
        $data['email'] = "<pre>{$data['email']}<pre>";
        $data['password'] = "**********";
        //画像をURL化
        if ($data['icon_url']) {
            $file_path = Url('') . '/' . str_replace('public/', 'storage/', $data['icon_url']);
            $data['icon_url'] = "<pre><a href= '{$file_path}'><img src='{$file_path}' width='100'></a><pre>";
        } else {
            $data['icon_url'] = "<pre>選択されていません<pre>";
        }

        return $data;
    }

    /**
     * 画像パスの生成
     * 
     */
    public function store($icon_image)
    {
        date_default_timezone_set('Asia/Tokyo');

        $originalName = $icon_image->getClientOriginalName();
        $fileName =  date("Ymd_His") . '.' . $originalName;
        $temp_path = $icon_image->storeAs('public/temp/administrators', $fileName);

        return $temp_path;
    }
}
