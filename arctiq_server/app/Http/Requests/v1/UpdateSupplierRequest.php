<?php

namespace App\Http\Requests\v1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSupplierRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
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
        $method = $this->method();

        if ($method == 'PUT') {
            return [
                'name' => ['required'],
                'contactPerson' => ['required'],
                'contactNo' => ['required'],
            ];
        } else {
            return [
                'name' => ['sometimes','required'],
                'contactPerson' => ['sometimes','required'],
                'contactNo' => ['sometimes','required'],
            ];
        }
    }

    protected function prepareForValidation()
    {
        if($this->contactPerson){
            $this->merge([
                'contact_person' => $this->contactPerson
            ]);
        }
        if($this->contactNo){
            $this->merge([
                'contact_no' => $this->contactNo
            ]);
        }
    }
}
