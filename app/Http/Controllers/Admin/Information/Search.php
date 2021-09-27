<?php
namespace App\Http\Controllers\Admin\Information;

use App\Http\TakemiLibs\InterfaceSearch;
use App\Http\TakemiLibs\SimpleForm;
use \Form;

/**
 * お知らせ管理画面の検索条件入力フォーム
 */
class Search implements InterfaceSearch{

    public function build(array $data = []): array {
        $form = [];
        $opt = ['class' => 'form_control'];

        //お知らせタイトル
        $form['title'] = Form::text('title', $data['title'] ?? '', $opt );

        $form['type'] = SimpleForm::radio('type', $data['type']??'', __('define.info.type'), $opt );

        $form['publish'] = SimpleForm::radio('publish', $data['publish']??'', __('define.publish'), $opt );
        return $form;
    }

    public function getRule(array $data = []): array {
        $ret = [];
        return $ret;
        
    }
}