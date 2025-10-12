<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ProfileCompletionRequest extends FormRequest
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

        return [
            'name' => ['required', 'string', 'max:255'],
            'nik' => ['required', 'string', 'min:16', 'max:16', 'regex:/^[0-9]+$/', 'unique:users,nik,'.$user->id],
            'phone' => ['required', 'string', 'max:13', 'regex:/^[0-9]+$/', 'unique:users,phone,'.$user->id],
            'address' => ['required', 'string', 'max:255'],
            'institution' => ['required', 'string', 'max:255'],
            'department_id' => ['required', 'integer', 'exists:departments,id'],
            'education_level_id' => ['required', 'integer', 'exists:education_levels,id'],
        ];
    }

    public function attributes()
    {
        return [
            'name' => __('Full Name'),
            'nik' => __('NIK'),
            'photo' => __('Photo'),
            'institution' => __('Institution'),
            'department_id' => __('Department'),
            'education_level_id' => __('Education Level'),
        ];
    }
}
