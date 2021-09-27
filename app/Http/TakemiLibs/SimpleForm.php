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
    public static function validation($data = [], $rule = [], $message = [])
    {
        //dd($data);
        //dd($rule);
        //dd($message);
        $validator = Validator::make($data, $rule, $message); //$dataを$ruleでvalidateする

        if ($validator->fails()) {
            return $validator;
        }

        return true;
    }

    /**
     * ラジオボタン生成
     * @return array
     */
    public static function radio($name, $val, $items, $option)
    {
        $ret = [];
        // var_dump($name);
        // var_dump($val);
        // var_dump($items); 
        //array(2) { [1]=> string(6) "公開" [2]=> string(9) "非公開" } 
        //array(2) { [1]=> string(21) "通常のお知らせ" [2]=> string(15) "リンクのみ" }
        // var_dump($option);
        //     array:2 [▼
        //     1 => "<input class="form_control" id="type_1" checked="checked" name="type" type="radio" value="1"><label for="type_1" for="type_1">通常のお知らせ</label>"
        //     2 => "<input class="form_control" id="type_2" name="type" type="radio" value="2"><label for="type_2" for="type_2">リンクのみ</label>"
        //   ]
        foreach ($items as $i => $v) {
            $opt = $option;

            if (empty($opt['id'])) $opt['id'] = "{$name}_{$i}"; //(array:1 [▼"id" => "type_1"])
            else $opt['id'] .= "_{$i}";

            $label_opt['for'] = $opt['id']; //(array:1 [▼"for" => "type_1"])
            //dd($label_opt);

            $ret[$i] =  Form::radio($name, $i, $i == $val ? true : false, $opt) .
                Form::label($label_opt['for'], $v, $label_opt);
        }
        //dd($ret);
        return $ret;
    }

    /**
     * チェックボックスの生成
     * @return array
     */
    public static function checkbox($name, $val, $items, $option = [])
    {
        $ret = [];
        foreach ($items as $i => $v) {
            $opt = $option;

            if (empty($opt['id'])) $opt['id'] = "{$name}_{$i}";
            else $opt['id'] .= "_{$i}";
            $label_opt['for'] = $opt['id'];

            if (strpos($name, '[]') === false) $name .= '[]';

            if ($val) {
                $ret[$i] =  Form::checkbox($name, $i, in_array($i, $val), $opt) .
                    Form::label($label_opt['for'], $v, $label_opt);
            } else {
                $ret[$i] =  Form::checkbox($name, $i, false, $opt) .
                    Form::label($label_opt['for'], $v, $label_opt);
            }
        }

        return $ret;
    }
}
