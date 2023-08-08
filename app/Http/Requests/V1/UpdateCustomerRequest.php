<?php

namespace App\Http\Requests\V1;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user();

        return $user != null && $user->tokenCan('update');

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $method = $this->method();

        if ($method === 'PUT') {
            return [
                'name' => ['required'],
                'type' => ['required', Rule::in(['I', 'B', 'b', 'i'])],
                'email' => ['required', 'email'],
                'city' => ['required'],
                'state' => ['required'],
                'address' => ['required'],
                'postalCode' => ['required']
            ];
        } else {
            return [
                'name' => ['sometimes', 'required'],
                'type' => ['sometimes', 'required', Rule::in(['I', 'B', 'b', 'i'])],
                'email' => ['sometimes', 'required', 'email'],
                'city' => ['sometimes', 'required'],
                'state' => ['sometimes', 'required'],
                'address' => ['sometimes', 'required'],
                'postalCode' => ['sometimes', 'required']
            ];
        }

    }

    public function prepareForValidation()
    {
        if ($this->postalCode) {
            $this->merge([
                'postal_code' => $this->postalCode
            ]);
        }
    }
}
