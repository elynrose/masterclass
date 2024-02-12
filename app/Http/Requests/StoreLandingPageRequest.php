<?php

namespace App\Http\Requests;

use App\Models\LandingPage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreLandingPageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('landing_page_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:landing_pages',
            ],
            'title' => [
                'string',
                'required',
            ],
            'sub_title' => [
                'string',
                'nullable',
            ],
            'cover_image' => [
                'required',
            ],
            'register_label' => [
                'string',
                'required',
            ],
            'teacher_photo' => [
                'required',
            ],
            'teacher_name' => [
                'string',
                'required',
            ],
            'teacher_bio' => [
                'required',
            ],
            'primary_color' => [
                'string',
                'nullable',
            ],
            'secondary_color' => [
                'string',
                'nullable',
            ],
        ];
    }
}
