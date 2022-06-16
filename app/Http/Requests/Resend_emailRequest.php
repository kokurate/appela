<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Resend_emailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        
        // Karena bisa diakses semua orang kembalikan nilai true
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', ],
        ];
    }

    public function messages()
    {
      return [
        'email.requied' => 'Email harus diisi' 
      ];
    }

    protected function prepareForValidation()
    {
      $this->merge([
          'email' => $this->email . '@unima.ac.id',
      ]);
    }
}
