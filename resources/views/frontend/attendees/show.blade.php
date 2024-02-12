@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.attendee.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.attendees.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.attendee.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $attendee->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.attendee.fields.session') }}
                                    </th>
                                    <td>
                                        {{ $attendee->session->title ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.attendee.fields.user') }}
                                    </th>
                                    <td>
                                        {{ $attendee->user->email ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.attendee.fields.from_email') }}
                                    </th>
                                    <td>
                                        {{ $attendee->from_email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.attendee.fields.from_website') }}
                                    </th>
                                    <td>
                                        {{ $attendee->from_website }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.attendee.fields.attended_session') }}
                                    </th>
                                    <td>
                                        {{ $attendee->attended_session }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.attendee.fields.received_follow_up_email') }}
                                    </th>
                                    <td>
                                        {{ $attendee->received_follow_up_email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.attendee.fields.viewed_follow_up') }}
                                    </th>
                                    <td>
                                        {{ $attendee->viewed_follow_up }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.attendee.fields.watched_last_session') }}
                                    </th>
                                    <td>
                                        {{ $attendee->watched_last_session }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.attendee.fields.invited_to_next_session') }}
                                    </th>
                                    <td>
                                        {{ $attendee->invited_to_next_session }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.attendee.fields.viewed_next_session_email') }}
                                    </th>
                                    <td>
                                        {{ $attendee->viewed_next_session_email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.attendee.fields.signed_up_for_next_session') }}
                                    </th>
                                    <td>
                                        {{ $attendee->signed_up_for_next_session }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.attendees.index') }}">
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