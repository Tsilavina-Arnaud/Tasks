<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskFormRequest extends FormRequest
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
            "title" => ['required', 'min:4'],
            "description" => ['required', 'string', 'min:8'],
            "observation_id" => ['required', 'numeric'],
            "begin_at" => ['required', 'date'],
            "hour_begin_at" => ['required'],
            "finished_at" => ['required', 'date'],
            "hour_finished_at" => ['required']
        ];
    }
}
