<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    public function rules()
    {
        return [
            'user_id' => ['required', 'exists:users,id'],
            'total' => ['required', 'numeric'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
