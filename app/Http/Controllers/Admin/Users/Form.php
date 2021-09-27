<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\TakemiLibs\SimpleForm;
use App\Http\TakemiLibs\InterfaceForm;
use \Form as FormF;

class Form implements InterfaceForm
{

    public function buildRegist(array $data = []): array
    {
        //$input = $data
        $form = [];
        $opt = ['class' => 'form-control', 'autocomplete' => 'off'];

        //??'' : $data['-']が無い場合、空に設定
        $form['title'] = FormF::text('title', $data['title'] ?? '', $opt);

        $form['type'] = SimpleForm::radio('type', $data['type'] ?? '', __('define.info.type'), []);

        $form['publish'] = SimpleForm::radio('publish', $data['publish'] ?? '', __('define.publish'), []);

        $form['publish_at'] = FormF::date('publish_at', $data['publish_at'] ?? '', $opt);

        $form['content'] = FormF::textarea('content', $data['content'] ?? '', $opt);

        $form['url'] = FormF::text('url', $data['url'] ?? '', $opt);

        return $form;
    }

    public function build(array $data = []): array
    {
        return $this->buildRegist($data);
    }

    public function getRule(array $data = []): array
    {
        return $this->getRuleRegist($data);
    }

    public function getRuleRegist(array $data = []): array
    {
        //var_dump($data);
        $rule = [];
        $rule['title'] = ['required', 'max:200'];
        $rule['type'] = ['required', 'integer'];
        $rule['publish'] = ['required', 'integer'];
        $rule['publish_at'] = ['required', 'date'];

        if (!empty($data['type']) && $data['type'] == 2) {
            $rule['url'] = ['required',  'max:2000'];
        } else {
            $rule['content'] = ['required',];
        }

        return $rule;
    }

    /**
     * フォームの値のHTMLを生成する
     * @param array $data
     * @return void
     */
    public function getHtml(array $data = [])
    {
        $data['type'] = __('define.info.type')[$data['type']] ?? '';
        $data['publish'] = __('define.publish')[$data['publish']] ?? '';
        $data['content'] = "<pre>{$data['content']}</pre>";
        if (!isset($data['url'])) $data['url'] = '';
        //dd($data['type']);
        //dd($data);
        return $data;
    }
}
