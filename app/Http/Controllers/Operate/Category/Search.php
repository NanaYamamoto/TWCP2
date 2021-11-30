<?php

namespace App\Http\Controllers\Operate\Category;

use App\Http\TakemiLibs\InterfaceSearch;
use App\Http\TakemiLibs\SimpleForm;
use \Form;

/**
 * カテゴリー管理の検索条件入力フォーム
 */
class Search implements InterfaceSearch
{

    public function build(array $data = []): array
    {
        $form = [];
        $opt = ['class' => 'form_control'];

        //検索項目
        $form['name'] = Form::text('name', $data['name'] ?? '', $opt);

        $form['active'] = SimpleForm::radio('active', $data['active'] ?? '', __('define.active'), []);


        return $form;
    }

    public function getRule(array $data = []): array
    {
        $ret = [];
        return $ret;
    }
}
