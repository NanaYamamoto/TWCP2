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
        
        $form['name'] = FormF::text('name', $data['name'] ?? '', $opt);

        $form['active'] = SimpleForm::radio('active', $data['active']??'', __('define.publish'), [] );

        $form['img'] = FormF::text('img', $data['img']??'', $opt );

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
       $rule['name'] = ['required', 'max:200' ];
       $rule['active'] = ['required' ];
       $rule['img'] = ['required' ];
       
       return $rule; 
    }

    /**
     * フォームの値のHTMLを生成する
     * @param array $data
     * @return void
     */
    public function getHtml( array $data = [] ) {
        
        $rule = [];
        $rule['name'] = ['required', 'max:20'];
        $data['active'] = __('define.category.active')[$data['active']] ?? '';
        $rule['img'] = ['required', 'max:30'];

        return $data;
    }
}