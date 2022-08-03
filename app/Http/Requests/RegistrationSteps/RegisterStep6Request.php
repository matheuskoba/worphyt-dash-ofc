<?php

namespace App\Http\Requests\RegistrationSteps;

use Illuminate\Foundation\Http\FormRequest;

class RegisterStep6Request extends FormRequest
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
            'gyms' => 'required'
        ];
    }
}
