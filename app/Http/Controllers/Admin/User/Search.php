<?php
namespace App\Http\Controllers\Admin\User;

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
        $form['name'] = Form::text('name', $data['name'] ?? '', $opt );
        $form['email'] = Form::text('email', $data['email'] ?? '', $opt );

        
        return $form;
    }

    public function getRule(array $data = []): array {
        $ret = [];
        return $ret;
        
    }
}