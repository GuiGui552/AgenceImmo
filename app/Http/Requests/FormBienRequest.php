<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormBienRequest extends FormRequest
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
            'titre' => ['required', 'min:6'],
            'surface' => ['required', 'numeric', 'min:1'],
            'prix' => ['required', 'numeric', 'min:1'],
            'description' => ['required', 'max:5000'],
            'pieces' => ['required', 'numeric', 'min:1'],
            'chambres' => ['required', 'numeric', 'min:1', 'lte:pieces'],
            'etages' => ['required', 'numeric', 'min:0'],
            'adresse' => ['required'],
            'ville' => ['required'],
            'code_postal' => ['required', 'numeric'],
            'vendu' => ['boolean'],
            'option' => ['required', 'array', 'exists:options,id']
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'vendu' => $this->input('vendu') ?: false
        ]);
    }
}