<?php

namespace App\Http\Controllers\Login;

use App\Http\TakemiLibs\SimpleForm;
use App\Http\TakemiLibs\InterfaceForm;
use Composer\DependencyResolver\Request;
use \Form as FormF;

use function PHPSTORM_META\type;

class Form implements InterfaceForm
{

    public function buildRegist(array $data = []): array
    {
        //$input = $data
        $form = [];
        $opt = ['class' => 'form-control', 'autocomplete' => 'off',];

        //??'' : $data['-']が無い場合、空に設定
        $form['name'] = FormF::text('name', $data['name'] ?? '', $opt);

        $form['email'] = FormF::email('email', $data['email'] ?? '', $opt);

        $form['active'] = SimpleForm::radio('active', $data['active'] ?? '', __('define.active'), []);

        $form['password'] = FormF::password('password', $opt);

        //$form['icon_image'] = FormF::file('iconimage', $data['icon_image'] ?? '', $opt);<-これでは動かない
        $form['icon_url'] = FormF::file('icon_url', $opt);


        return $form;
    }

    public function build(array $data = []): array
    {
        return $this->buildRegist($data);
    }

    public function getRule(array $data = []): array
    {
        $rule = [];
        $rule['email'] = ['email', 'required', 'max:255'];
        $rule['password'] = ['required'];
        return $rule;
    }

    public function getRuleRegist(array $data = []): array
    {
        //var_dump($data);
        $rule = [];
        $rule['name'] = ['required', 'max:20'];
        $rule['email'] = ['email', 'required', 'max:30', 'unique:users'];
        $rule['password'] = ['required', 'max:30', 'min:8'];
        $rule['icon'] = ['image', 'mimes:jpeg,png,jpg,bmb', 'max:2048', 'nullable'];

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
        }
        $data['icon_url'] = "<pre><a href= '{$file_path}'><img src='{$file_path}' width='100'></a><pre>";
        //dd($data);
        return $data;
    }

    /**
     * 画像パスの生成
     * 
     */
    public function store($iconfile)
    {
        $temp_path = $iconfile->store('public/temp');
        $read_temp_path = str_replace('public/', '/storage/', $temp_path);

        return [$temp_path, $read_temp_path];
    }
}
