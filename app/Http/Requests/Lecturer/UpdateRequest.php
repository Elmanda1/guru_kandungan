<?php

namespace App\Http\Requests\Lecturer;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'nik' => ['required', 'string', 'min:16', 'max:25', 'regex:/^[0-9]+$/', 'unique:users,nik,'.$this->user->id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$this->user->id],
            'phone' => ['required', 'string', 'max:13', 'regex:/^[0-9]+$/', 'unique:users,phone,'.$this->user->id],
            'address' => ['required', 'string', 'max:255'],
            'institution' => ['required', 'string', 'max:255'],
            'department_id' => ['required', 'integer', 'exists:departments,id'],
            'education_level_id' => ['required', 'integer', 'exists:education_levels,id'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'cv' => ['nullable', 'string', 'max:500'],
            'password' => ['nullable', 'string', 'min:8', 'max:255', 'confirmed'],
            'password_confirmation' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function attributes()
    {
        return [
            'name' => __('Full Name'),
            'nik' => __('NIK'),
            'photo' => __('Photo'),
            'education_level_id' => __('Education Level'),
            'cv' => __('CV'),
        ];
    }
}
