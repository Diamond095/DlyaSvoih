<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'имя'=>'required|string|max:17',
            'мобильный телефон'=>'required|string|max:13',
            'электронная почта'=>'required|string|email',
            'улица'=>'required|string|in:Туровского,Мстиславца,Скорины',
            'квартира'=>'required|string|max:4',
            'дом'=>'required|string',
            'тип платежа'=>'required',
            'блюда'=>'required',
            'время'=>'sometimes',
            'комментарий'=>'sometimes',
            'время'=>'sometimes'
        ];
    }
    public function messages(){
        return[
            'блюда'=>[
                'required'=>'Ваша корзина пуста чтобы сделать заказ, добавьте что-нибудь в корзину'
            ],
            'улица'=>[
                'in'=>'Мы не доставляем на эту улицу. Улицы на которые мы доставляем:Туровского,Мстиславца,Скорины',
                'required'=>'Поле улица обязательное для заполнения.'
            ],
            'электронная почта'=>[
                'required'=>'Поле электронная почта обязательное для заполнения.',
                'email' => 'Поле электронная почта должно быть действительным электронным адресом.',
            ],
            'мобильный телефон'=>[
                'required'=>'Поле мобильный телефон обязательное для заполнения.'
            ]
          ];
    }
}
