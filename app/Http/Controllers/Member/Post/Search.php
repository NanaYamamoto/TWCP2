<?php
namespace App\Http\Controllers\Member\Post;

use App\Http\TakemiLibs\InterfaceSearch;
use App\Http\TakemiLibs\SimpleForm;
use App\Models\User;
use \Form;

/**
 * お知らせ管理画面の検索条件入力フォーム
 */
class Search implements InterfaceSearch{

    public function build(array $data = []): array {
        $form = [];
        $opt = ['class' => 'form_control'];
        $users = User::query();

        //お知らせタイトル
        $form['category'] = Form::text('category', $data['category'] ?? '', $opt );

        $form['title'] = Form::text('title', $data['title'] ?? '', $opt );
        
        $form['content'] = Form::text('content', $data['content'] ?? '', $opt );
        
        $form['type'] = SimpleForm::radio('type', $data['type']??'', __('define.info.type'), $opt );

        $form['name'] = Form::text('name', $data['name'] ?? '', $opt );
        
        return $form;
    }

    public function getRule(array $data = []): array {
        $ret = [];
        return $ret;
    }
}