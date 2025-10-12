<?php

namespace App\Http\Requests\Profile;

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
        $user = auth()->user();
        $role = $user->getRoleNames()->first();

        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ];

        if ($role != 'admin') {
            $rules = array_merge($rules, [
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
                'phone' => ['required', 'string', 'max:13', 'regex:/^[0-9]+$/', 'unique:users,phone,'.$user->id],
                'address' => ['required', 'string', 'max:255'],
                'institution' => ['required', 'string', 'max:255'],
                'department_id' => ['required', 'integer', 'exists:departments,id'],
                'education_level_id' => ['required', 'integer', 'exists:education_levels,id'],
            ]);
        }

        if ($role == 'lecturer') {
            $rules = array_merge($rules, [
                'cv' => ['nullable', 'string'],
            ]);
        }

        return $rules;
    }

    public function attributes()
    {
        return [
            'name' => __('Full Name'),
            'photo' => __('Photo'),
            'education_level_id' => __('Education Level'),
        ];
    }
}
