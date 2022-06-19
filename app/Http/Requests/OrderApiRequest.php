<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderApiRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id' => 'required|max:255',
            'name' => 'required|max:255',
            'menu_text' => 'required|max:255',
            'price' => 'required|max:255',
            'category' => 'required|max:255',
            'amount' => 'required|max:255',
        ];
    }
}
