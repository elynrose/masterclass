<?php

namespace App\Http\Requests;

use App\Models\Attendee;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAttendeeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('attendee_edit');
    }

    public function rules()
    {
        return [
            'session_id' => [
                'required',
                'integer',
            ],
            'user_id' => [
                'required',
                'integer',
            ],
            'from_email' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'from_website' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'attended_session' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'received_follow_up_email' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'viewed_follow_up' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'watched_last_session' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'invited_to_next_session' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'viewed_next_session_email' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'signed_up_for_next_session' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
