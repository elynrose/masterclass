<?php

namespace App\Http\Requests;

use App\Models\Session;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSessionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('session_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'excerpt' => [
                'required',
            ],
            'zoom_link' => [
                'required',
            ],
            'date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'time' => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'duration' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'attachment' => [
                'array',
            ],
        ];
    }
}
