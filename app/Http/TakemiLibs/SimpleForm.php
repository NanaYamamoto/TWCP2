<?php
/**
 * @version 1.0.0
 * @author takemi <takemi.vtuber@gmail.com>
 */
namespace App\Http\TakemiLibs;

use \Form;
use Illuminate\Support\Facades\Validator;

/**
 * Form生成を簡易にする関数群クラス
 */
class SimpleForm 
{
    /**
     * バリデーション処理
     * @param array $data バリデーション対象データ配列
     * @param array $rule バリデーションルール配列
     * @return true|Valicator
     */
    public static function validation( $data = [], $rule = [], $message = [] ) {
        $validator = Validator::make( $data, $rule, $message );

        if( $validator->fails() ){
            return $validator;
        }

        return true;
    }

    /**
     * ラジオボタン生成
     * @return array
     */
    public static function radio( $name, $val, $items, $option )
    {
        $ret = [];
        foreach( $items as $i => $v ) {
            $opt = $option;

            if( empty($opt['id']) ) $opt['id'] = "{$name}_{$i}";
            else $opt['id'] .= "_{$i}";

            $label_opt['for'] = $opt['id'];
            $ret[$i] =  Form::radio($name, $i, $i == $val ? true:false, $opt ).
                        Form::label($label_opt['for'], $v, $label_opt ); 
        } 
        return $ret;
    }

    /**
     * チェックボックスの生成
     * @return array
     */
    public static function checkbox( $name, $val, $items, $option = [] )
    {
        $ret = [];
        foreach( $items as $i => $v ) {
            $opt = $option;

            if( empty($opt['id']) ) $opt['id'] = "{$name}_{$i}";
            else $opt['id'] .= "_{$i}";
            $label_opt['for'] = $opt['id'];

            if( strpos( $name, '[]') === false ) $name .= '[]';

            if( $val ) {
                $ret[$i] =  Form::checkbox( $name, $i, in_array( $i, $val), $opt ).
                            Form::label( $label_opt['for'], $v, $label_opt );
            } else {
                $ret[$i] =  Form::checkbox( $name, $i, false, $opt ).
                            Form::label( $label_opt['for'], $v, $label_opt );
            }
        }

        return $ret;
    }
}