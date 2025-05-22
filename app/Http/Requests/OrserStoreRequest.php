<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'full_name'  => 'required|string|max:255',
            'comment'  => 'string|max:255',
            'count' => 'required|integer|min:1',
            'product_id' => 'required|integer|exists:products,id',
        ];
    }
    public function attributes(): array
    {
        return [
            'full_name' => 'ФИО',
            'comment' => 'комментарий',
            'count' => 'количество',
        ];
    }
}
