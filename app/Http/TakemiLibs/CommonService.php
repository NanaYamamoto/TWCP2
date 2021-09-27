<?php
/**
 * @version 1.0.0
 * @author takemi <takemi.vtuber@gmail.com>
 */
namespace App\Http\TakemiLibs;

/**
 * 管理画面のサービスの基底クラス
 */
class CommonService {

    /**
     * 検索処理
     * @param array $data
     * @param integer $offset
     * @return Collection
     */
    public function getList( $data = [], $offset = 30 ){

    }

    /**
     * 新規登録処理
     * @param array $data
     * @return Models
     */
    public function regist( $data = [] ){

    }
    /**
     * 更新処理
     * @param array $data
     * @return Models
     */
    public function update( $id, $data = [] ){

    }

    /**
     * 削除処理
     * @param [type] $id
     * @return void
     */
    public function delete( $id ){

    }
}