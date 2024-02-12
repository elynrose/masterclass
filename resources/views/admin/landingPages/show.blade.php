@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.landingPage.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.landing-pages.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.landingPage.fields.id') }}
                        </th>
                        <td>
                            {{ $landingPage->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.landingPage.fields.name') }}
                        </th>
                        <td>
                            {{ $landingPage->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.landingPage.fields.logo') }}
                        </th>
                        <td>
                            @if($landingPage->logo)
                                <a href="{{ $landingPage->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $landingPage->logo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.landingPage.fields.title') }}
                        </th>
                        <td>
                            {{ $landingPage->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.landingPage.fields.sub_title') }}
                        </th>
                        <td>
                            {{ $landingPage->sub_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.landingPage.fields.cover_image') }}
                        </th>
                        <td>
                            @if($landingPage->cover_image)
                                <a href="{{ $landingPage->cover_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $landingPage->cover_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.landingPage.fields.register_label') }}
                        </th>
                        <td>
                            {{ $landingPage->register_label }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.landingPage.fields.teacher_photo') }}
                        </th>
                        <td>
                            @if($landingPage->teacher_photo)
                                <a href="{{ $landingPage->teacher_photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $landingPage->teacher_photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.landingPage.fields.teacher_name') }}
                        </th>
                        <td>
                            {{ $landingPage->teacher_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.landingPage.fields.stripe_code') }}
                        </th>
                        <td>
                            {{ $landingPage->stripe_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.landingPage.fields.teacher_bio') }}
                        </th>
                        <td>
                            {!! $landingPage->teacher_bio !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.landingPage.fields.primary_color') }}
                        </th>
                        <td>
                            {{ $landingPage->primary_color }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.landingPage.fields.secondary_color') }}
                        </th>
                        <td>
                            {{ $landingPage->secondary_color }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.landing-pages.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection