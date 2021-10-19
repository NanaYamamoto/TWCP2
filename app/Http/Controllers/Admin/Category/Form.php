<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\TakemiLibs\SimpleForm;
use App\Http\TakemiLibs\InterfaceForm;
use \Form as FormF;

class Form implements InterfaceForm{

    public function buildRegist( array $data = [] ) : array
    {
        $form = [];
        $opt = ['class' => 'form-control', 'autocomplete' => 'off'];
        
        $form['name'] = FormF::text('name', $data['name'] ?? '', $opt);

        $form['active'] = SimpleForm::radio('active', $data['active']??'', __('define.publish'), [] );

        $form['img'] = FormF::input('file', 'img', $data['img'] ?? '', $opt);

        return $form;
    }

    public function build( array $data = [] ): array
    {
        return $this->buildRegist( $data );
    }

    public function getRule(array $data = []): array
    {
        return $this->getRuleRegist( $data );
    }

    public function getRuleRegist(array $data = []): array
    {
       $rule = [];
       $rule['name'] = ['required', 'max:20' ];
       $rule['active'] = ['required' ];
       $rule['img'] = [ 'image','file','mimes:jpeg,png,jpg,bmb' ];
       
       return $rule; 
    }

    /**
     * フォームの値のHTMLを生成する
     * @param array $data
     * @return void
     */
    public function getHtml( array $data = [] ) {
/*        
        $rule = [];
        $rule['name'] = ['required', 'max:20'];
        $rule['active'] = __('define.category.active')[$data['active']] ?? '';
        //画像をURL化
        if ($data['category_url']) {
            $file_path = Url('') . '/' . str_replace('public/', 'storage/', $data['img']);
        }
        $data['category_url'] = "<pre><a href= '{$file_path}'><img src='{$file_path}' width='100'></a><pre>";
*/
        $data['img'] = url($data['img']);

        return $data;
    }

    /**
     * 画像パスの生成
     * 
     */
    public function store($category_image)
    {
        date_default_timezone_set('Asia/Tokyo');

        $originalName = $category_image->getClientOriginalName();
        $fileName =  date("Ymd_His") . '.' . $originalName;
        $temp_path = $category_image->storeAs('public/temp/category', $fileName);

        return $temp_path;
    }
}