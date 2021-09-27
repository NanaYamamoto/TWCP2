<?php

/**
 * @version 1.0.0
 * @author takemi <takemi.vtuber@gmail.com>
 */
namespace App\Http\TakemiLibs;

interface InterfaceForm {
    /**
     * 変更、詳細のフォーム配列を取得
     * @param array $data
     * @return array
     */
    public function build( array $data = [] ) : array ;
    /**
     * 新規登録用のフォーム配列を取得`
     * @param array $data
     * @return array
     */
    public function buildRegist( array $data = [] ) : array ;

    /**
     * 変更、削除時のバリデーションルールを取得
     * @param array $data
     * @return array
     */
    public function getRule( array $data = [] ) : array ;

    /**
     * 新規登録時のバリデーションルールを取得
     * @param array $data
     * @return array
     */
    public function getRuleRegist( array $data = [] ) : array ;

}