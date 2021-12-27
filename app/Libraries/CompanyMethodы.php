<?php

namespace App\Libraries;

class CompanyMethodы
{
    public function MyValidate ($request)
    {

        $validatedData = $request->validate ([
            'fullname' => ['required', 'max:255'],
            'name' => ['required', 'max:100'],

            'inn' => ['required', 'digits_between:10,12'],
            'kpp' => ['nullable', 'digits:9'],
            'ogrn' => ['nullable', 'digits:13'],

            'address' => ['nullable', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'max:30'],
            'site' => ['nullable', 'max:100'],
            'head_position' => ['nullable', 'max:50', 'string'],
            'head_name' => ['nullable', 'max:50', 'string'],
            'accountant_position' => ['nullable', 'max:50', 'string'],
            'accountant_name' => ['nullable', 'max:50', 'string'],

            'bank_name' => ['required', 'max:255'],
            'bank_bik' => ['required', 'digits:9'],
            'bank_account' => ['required', 'digits:20'],
            'account' => ['required', 'digits:20'],

            'information' => ['nullable', 'max:255'],
        ],
            [
                'fullname.required' => 'Наименование не указано',
                'name.required' => 'Наименование не указано',

                'inn.required' => 'ИНН не указан',
                'inn.digits_between' => 'Содержит 10 или 12 цифр',
                'kpp.digits' => 'Содержить 9 цифр',
                'ogrn.digits' => 'Содержит 13 или 15 цифр',

                'address.max' => 'Не более 255 символов',
                'email.email' => 'Неверный формат',
                'email.max' => 'Не более 255 символов',
                'phone.max' => 'Не более 30 символов',
                'site.max' => 'Не более 100 символов',

                'head_position.max' => 'Не более 50 символов',
                'head_name.max' => 'Не более 50 символов',

                'accountant_position.max' => 'Не более 50 символов',
                'accountant_name.max' => 'Не более 50 символов',

                'bank_name.required' => 'Наименование не указано',
                'bank_name.required' => 'Наименование не указано',

                'bank_bik.required' => 'БИК не указан',
                'bank_bik.digits' => 'Содержить 9 цифр',

                'bank_account.required' => 'Счет не указан',
                'bank_account.digits' => 'Содержить 20 цифр',

                'account.required' => 'Счет не указан',
                'account.digits' => 'Содержить 20 цифр',

                'information.max' => 'Не более 255 символов',
            ]);
    }

}