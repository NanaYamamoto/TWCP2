<?php

namespace App\Http\Controllers\Member\Post;

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
        $opt = ['class' => 'form-control', 'autocomplete' => 'off'];

        $form['id'] = FormF::hidden('id', $data['id'] ?? '', $opt);
        
        $form['name'] = FormF::text('name', $data['name'] ?? '', $opt);

        $form['category_id'] = FormF::select('category_id', $categories  ?? '', $opt, ['style' => 'display:block; width: 20rem; padding: 0.375rem 0.75rem; font-size: 1rem; font-weight: 400; line-height: 1.5; border: 1px solid #ced4da; border-radius: 0.25rem;']);

        $form['title'] = FormF::text('title', $data['title'] ?? '', $opt, ['style' => 'width: 80%;']);

        $form['content'] = FormF::textarea('content', $data['content'] ?? '', $opt);
        
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

        $rule['img'] = ['nullable'];

        
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
        
        //画像をURL化
        if ($data['img']) {
            $file_path = Url('') . '/' . str_replace('public/', 'storage/', $data['img']);
            $data['img'] = "<pre><a href= '{$file_path}'><img src='{$file_path}' width='100'></a><pre>";
        } else {
            $data['img'] = "<pre>選択されていません<pre>";
        }
        
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
