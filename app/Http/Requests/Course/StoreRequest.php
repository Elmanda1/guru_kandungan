<?php

namespace App\Http\Requests\Course;

use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'topic_id' => ['required', 'exists:topics,id'],
            'lecturer_id' => ['required', 'exists:users,id'],
            'title' => ['required', 'string', 'max:255', 'unique:courses,title'],
            'education_level_ids' => ['required', 'array', 'min:1'],
            'description' => ['required', 'string'],
            'date' => ['required', 'date'],
            'start_time' => [
                'required',
                'date_format:H:i',
                function ($attribute, $value, $fail) {
                    $date = request()->input('date');
                    $startTime = Carbon::createFromFormat('H:i', $value);

                    $exists = Course::where('date', $date)
                        ->where(function ($query) use ($startTime) {
                            $query->whereBetween('start_time', [
                                $startTime->copy()->subMinutes(59)->format('H:i'),
                                $startTime->copy()->addMinutes(59)->format('H:i'),
                            ]);
                        })
                        ->exists();

                    if ($exists) {
                        $fail('Tanggal atau Waktu Mulai tidak tersedia.');
                    }
                },
            ],
            'quota' => ['required', 'integer', 'min:1'],
            'zoom_link' => ['required', 'url'],
            'zoom_id' => ['required', 'string', 'max:255'],
            'zoom_password' => ['required', 'string', 'max:255'],
        ];
    }

    public function attributes()
    {
        return [
            'topic_id' => __('Topic'),
            'lecturer_id' => __('Lecturer'),
            'start_time' => __('Start Time'),
            'quota' => __('Quota'),
            'zoom_link' => __('Link Zoom'),
            'zoom_id' => __('ID Zoom'),
            'zoom_password' => __('Password Zoom'),
            'education_level_ids' => __('Sasaran Peserta'),
        ];
    }
}
