<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            'title'=> 'required|max:100|min:5',
            'description'=> 'nullable',
            'staff'=> 'nullable',
            'img'=> 'required',
            'slug'=> 'nullable',
        ];
    }
    public function message(){
        return  [
            'title.required'=> 'il titolo è obbligatorio',
            'title.max'=> 'massimo 100 caratteri',
            'title.min'=> 'minimo 5 caratteri',
            'img.required'=> 'campo obbligatorio',
            // 'img.image'=>'formato errato',
        ];
    }
}
