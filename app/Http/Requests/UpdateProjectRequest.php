<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'title'=> [Rule::unique('projects')->ignore($this->project), 'required', 'max:100', 'min:5'],
            'description'=> 'nullable',
            'staff'=> 'nullable',
            'img'=> ['nullable','image', 'max:2048'],
            'slug'=> 'nullable',
            'type_id'=> ['nullable', 'exists:types,id'],
            'technologies'=> ['nullable', 'exists:technologies,id'],
        ];
    }
}
