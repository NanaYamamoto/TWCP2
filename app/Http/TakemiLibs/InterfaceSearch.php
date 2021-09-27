<?php

/**
 * @version 1.0.0
 * @author takemi <takemi.vtuber@gmail.com>
 */
namespace App\Http\TakemiLibs;

interface InterfaceSearch {
    /**
     * 検索用のフォーム配列を取得
     * @param array $data
     * @return array
     */
    public function build( array $data = [] ) : array ;

    /**
     * 検索用のバリデーションルールを取得
     * @param array $data
     * @return array
     */
    public function getRule( array $data = [] ) : array ;

}