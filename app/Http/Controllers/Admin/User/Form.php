<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\TakemiLibs\SimpleForm;
use App\Http\TakemiLibs\InterfaceForm;
use \Form as FormF;

class Form implements InterfaceForm
{

    public function buildRegist(array $data = []): array
    {
        $form = [];
        $opt = ['class' => 'form-control', 'autocomplete' => 'off'];

        $form['name'] = FormF::text('name', $data['name'] ?? '', $opt);

        $form['email'] = FormF::email('email', $data['email'] ?? '', $opt);

        $form['password'] = FormF::password('password', $opt, $data['password'] ?? '');
        // ↑$optと$data['password'] ?? ''の順番を入れ替えたら表示できる。
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
        $rule = [];
        $rule['name'] = ['required', 'max:20'];
        $rule['email'] = ['required', 'max:30'];
        $rule['password'] = ['required', 'max:30'];

        return $rule;
    }
}
