<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Factory;
use Illuminate\Validation\ValidationException;

class StorePhraseRequest extends FormRequest
{

    public function __construct(Factory $validationFactory)
    {
        $validationFactory->extend(
            'uniquePhrase',
            function () {
                $counter = DB::table('phrases')
                    ->where(['type_id' => $this->request->get('type'),
                        'texte' => $this->request->get('texte')])
                    ->count();
                return 0 === $counter;
            },
            'Cette phrase existe déjà.'
        );
    }

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
            'type' => 'required|uniquePhrase',
            'texte' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nom.required' => 'Le champ nom est obligatoire.',
            'texte.required' => 'Le champ texte est obligatoire.'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(response()->json(['errors' => $errors
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }
}
