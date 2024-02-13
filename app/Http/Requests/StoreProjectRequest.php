<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProjectRequest extends FormRequest
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
            'title'=> ['unique:projects,title', 'required', 'max:100', 'min:5'],
            'description'=> 'nullable',
            'staff'=> 'nullable',
            'img'=> ['nullable','image', 'max:2048'],
            'slug'=> 'nullable',
            'type_id'=> ['nullable', 'exists:types,id'],
            'tecnologies'=> ['nullable', 'exists:tecnologies,id'],
        ];
    }
    public function message(){
        return  [
            'title.unique'=> 'il titolo non può essere duplicato',
            'title.required'=> 'il titolo è obbligatorio',
            'title.max'=> 'massimo 100 caratteri',
            'title.min'=> 'minimo 5 caratteri',
            'img.max'=> 'il file puo pesare messimo 2 mega',
            'type_id.exists'=> 'il campo type è errato',
            'tecnologies.exists'=> 'il campo tecnology è errato',
        ];
    }
}
