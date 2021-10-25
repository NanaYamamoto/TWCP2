<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\TakemiLibs\SimpleForm;
use App\Http\TakemiLibs\InterfaceForm;
use \Form as FormF;
use App\Models\Category;

class Form implements InterfaceForm
{
    public function buildRegist(array $data = []): array
    {
        // $user = User::query();
        $user = \Auth::id();
        $categories = Category::select('id','name')->get()->pluck('name','id');
        
        $form = [];
        $opt = ['class' => 'ef', 'autocomplete' => 'off'];// 元は'class' => 'form-control'

        $form['name'] = FormF::text('name', $data['name'] ?? '', $opt);

        $form['category_id'] = FormF::select('category_id', $categories  ?? '', $opt);

        $form['title'] = FormF::text('title', $data['title'] ?? '', $opt);

        $form['content'] = FormF::textarea('content', $data['content'] ?? '', $opt);

        // $form['type'] = SimpleForm::radio('type', $data['type'] ?? '', __('define.info.type'), []);

        $form['publish'] = SimpleForm::radio('publish', $data['publish']??'', __('define.publish'), [] );
        
        $form['user_id'] = FormF::hidden('user_id', $user ?? '', $opt);
        $form['img'] = FormF::file('img', $opt, $data['img'] ?? '');

        $form['url'] = FormF::text('url', $data['url'] ?? '', $opt);
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
        $rule['category_id'] = ['required'];
        $rule['title'] = ['required'];
        $rule['content'] = ['required'];
        // $rule['type'] = ['required'];
        $rule['publish'] = ['required'];
        
        
        $rule['img'] = ['nullable', 'img', 'mimes:jpeg,png,jpg,bmb', 'max:2048'];

        
        return $rule;
    }

    /**
     * フォームの値のHTMLを生成する
     * @param array $data
     * @return void
     */
    public function getHtml(array $data = [])
    {
        
        $data['user_id'] = FormF::hidden('user_id');
        $data['publish'] = __('define.publish')[$data['publish']] ?? '';
        $data['content'] = "<pre>{$data['content']}</pre>";
        if( !isset($data['url']) ) $data['url'] = '';
        
        return $data;
    }

    public function store($icon_image)
    {
        date_default_timezone_set('Asia/Tokyo');

        $originalName = $icon_image->getClientOriginalName();
        $fileName =  date("Ymd_His") . '.' . $originalName;
        $temp_path = $icon_image->storeAs('public/temp/members', $fileName);

        return $temp_path;
    }
}
