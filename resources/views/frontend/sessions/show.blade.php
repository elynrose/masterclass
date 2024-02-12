@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.session.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.sessions.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.session.fields.cover_image') }}
                                    </th>
                                    <td>
                                        @if($session->cover_image)
                                            <a href="{{ $session->cover_image->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $session->cover_image->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.session.fields.title') }}
                                    </th>
                                    <td>
                                        {{ $session->title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.session.fields.excerpt') }}
                                    </th>
                                    <td>
                                        {!! $session->excerpt !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.session.fields.intro_video') }}
                                    </th>
                                    <td>
                                        @if($session->intro_video)
                                            <a href="{{ $session->intro_video->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.session.fields.topics') }}
                                    </th>
                                    <td>
                                        {!! $session->topics !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.session.fields.course_details') }}
                                    </th>
                                    <td>
                                        {!! $session->course_details !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.session.fields.zoom_link') }}
                                    </th>
                                    <td>
                                        {{ $session->zoom_link }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.session.fields.date') }}
                                    </th>
                                    <td>
                                        {{ $session->date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.session.fields.time') }}
                                    </th>
                                    <td>
                                        {{ $session->time }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.session.fields.duration') }}
                                    </th>
                                    <td>
                                        {{ $session->duration }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.session.fields.attachment') }}
                                    </th>
                                    <td>
                                        @foreach($session->attachment as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank">
                                                {{ trans('global.view_file') }}
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.session.fields.next_session') }}
                                    </th>
                                    <td>
                                        {{ $session->next_session->title ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.sessions.index') }}">
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