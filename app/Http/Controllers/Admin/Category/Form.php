<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\TakemiLibs\SimpleForm;
use App\Http\TakemiLibs\InterfaceForm;
use \Form as FormF;

class Form implements InterfaceForm{

    public function buildRegist( array $data = [] ) : array
    {
        $form = [];
        $opt = ['class' => 'form-control', 'autocomplete' => 'off'];
        
        $form['id'] = FormF::text('id', $data['id']??'', $opt );
        
        $form['name'] = FormF::text('name', $data['name'] ?? '', $opt);

        $form['img'] = FormF::file('img', $data['img']??'', $opt );

        return $form;
    }
        


    public function build( array $data = [] ): array
    {
        return $this->buildRegist( $data );
    }

    public function getRule(array $data = []): array
    {
        return $this->getRuleRegist( $data );
    }

    public function getRuleRegist(array $data = []): array
    {
       $rule = [];
       $rule['title'] = ['required', 'max:200' ];
       $rule['type'] = ['required', 'integer' ];
       $rule['publish'] = ['required', 'integer' ];
       $rule['publish_at'] = ['required', 'date' ];

       if ( !empty($data['type']) && $data['type'] == 2 ) {
               $rule['url'] = ['required',  'max:2000' ];
       } else {
           $rule['content'] = ['required',   ];
       }

       return $rule; 
    }

    /**
     * フォームの値のHTMLを生成する
     * @param array $data
     * @return void
     */
    public function getHtml( array $data = [] ) {
        /*
        $data['type'] = __('define.info.type')[$data['type']] ?? '';
        $data['publish'] = __('define.publish')[$data['publish']] ?? '';
        $data['content'] = "<pre>{$data['content']}</pre>";
        if( !isset($data['url']) ) $data['url'] = '';
        */
        return $data;
    }
}