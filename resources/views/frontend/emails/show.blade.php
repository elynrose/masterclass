@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.email.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.emails.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.email.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $email->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.email.fields.subject') }}
                                    </th>
                                    <td>
                                        {{ $email->subject }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.email.fields.body') }}
                                    </th>
                                    <td>
                                        {!! $email->body !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.email.fields.session') }}
                                    </th>
                                    <td>
                                        {{ $email->session->title ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.email.fields.ordering') }}
                                    </th>
                                    <td>
                                        {{ $email->ordering }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.email.fields.landing_page') }}
                                    </th>
                                    <td>
                                        {{ $email->landing_page->name ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.emails.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection