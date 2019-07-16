<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class StoreTypeRequest extends FormRequest
{

        public function wantsJson()
    {
        return true;
    }

    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'categorie' => 'required',
            'champ' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'categorie.required' => 'Le champ catégorie est obligatoire.',
            'nom.required' => 'Le champ nom est obligatoire.'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(response()->json(['errors' => $errors
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }
}
