<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'úser_id' => 'required|exist:users, id',
            'name' => 'required|string|min:2|max:50',
            'email' => 'required|email|string|min:2|max:50',
            'phone' => 'required|min:2|max:15',
            'address' => 'required|string|min:2|max:50',
            'password' => 'required|string|min:6|max:20',
        ];
    }
}
