<?php

namespace App\Http\Requests\V1;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user();

        return $user != null && $user->tokenCan('create');

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
            'name' => ['required'],
            'type' => ['required', Rule::in(['I', 'B', 'b', 'i'])],
            'email' => ['required', 'email'],
            'city' => ['required'],
            'state' => ['required'],
            'address' => ['required'],
            'postalCode' => ['required']
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'postal_code' => $this->postalCode
        ]);
    }
}
