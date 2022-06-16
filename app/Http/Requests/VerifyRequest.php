<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VerifyRequest extends FormRequest
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
            'email' => ['required', Rule::unique('pengaduans')],
        ];
    }

    public function messages()
    {
      return [
        'email.unique' => 'Email ini sedang melakukan Pengaduan. Tunggu pengaduan selesai untuk membuat pengaduan kembali ' 
      ];
    }

    protected function prepareForValidation()
    {
      $this->merge([
          'email' => $this->email . '@unima.ac.id',
      ]);
    }
}
