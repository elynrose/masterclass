<?php

namespace App\Http\Requests;

use App\Models\Subscriber;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSubscriberRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('subscriber_create');
    }

    public function rules()
    {
        return [
            'full_name' => [
                'string',
                'required',
            ],
            'email_address' => [
                'required',
            ],
            'phone_number' => [
                'string',
                'nullable',
            ],
            'provided_phone' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'signed_up' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'read_page_contents' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'landing_page_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
