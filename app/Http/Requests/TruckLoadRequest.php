<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class TruckLoadRequest extends FormRequest
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
    protected function failedValidation(Validator $validator)
    {
        $response = response()->json([
            'message' => 'Данные не прошли проверку валидации',
            'errors' => $validator->errors()
        ], 422);

        throw new HttpResponseException($response);
    }

    public function rules()
    {
        return [
            'numCargoUnits' => 'required|integer|min:1',
            'truckType' => 'required|integer|in:16,20,25',
        ];
    }

    public function messages()
    {
        return [
            'numCargoUnits.required' => 'Необходимо указать количество грузовых единиц',
            'numCargoUnits.integer' => 'Количество грузовых единиц должно быть числом',
            'truckType.required' => 'Необходимо указать тип грузовика',
            'truckType.integer' => 'Тип грузовика должен быть числом',
            'truckType.in' => 'Выбранный тип грузовика недопустим',
        ];
    }
}
