<?php

namespace App\Http\Controllers\Operate\Post;

use App\Http\TakemiLibs\InterfaceSearch;
use App\Http\TakemiLibs\SimpleForm;
use \Form;

/**
 * お知らせ管理画面の検索条件入力フォーム
 */
class Search implements InterfaceSearch
{

    public function build(array $data = []): array
    {
        $form = [];
        $opt = ['class' => 'form-control', 'autocomplete' => 'off'];

        //コメントキーワード
        $form['keyword']  = Form::text('keyword', $data['keyword'] ?? '', $opt);
        $form['begin_at'] = Form::date('begin_at', $data['begin_at'] ?? '', $opt);
        $form['end_at']   = Form::date('end_at', $data['end_at'] ?? '', $opt);

        return $form;
    }

    public function getRule(array $data = []): array
    {
        $ret = [
            'begin_at' => [ 'date', 'lt:end_at' ],
            'end_at' => [ 'date', 'gt:begin_at'],
        ];
        return $ret;
    }
}
