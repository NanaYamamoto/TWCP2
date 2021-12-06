<?php

namespace App\Http\Controllers\Operate\Members;

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
        $rule = $this->getRuleRegist($data);

        
        $rule['email'] = ['email', 'required', 'max:30'];

        return $rule;
    }

    public function getRuleRegist(array $data = []): array
    {
        //var_dump($data);
        $rule = [];
        $rule['name'] = ['required', 'max:20'];
        $rule['email'] = ['email', 'required', 'max:30', 'unique:users'];
        $rule['password'] = ['required', 'max:30', 'min:8'];
        $rule['icon_url'] = ['image', 'mimes:jpeg,png,jpg,bmb'];

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

        //dd($data);
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
        $temp_path = $icon_image->storeAs('public/temp/members', $fileName);

        return $temp_path;
    }
}
