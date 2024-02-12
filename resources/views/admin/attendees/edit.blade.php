@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.attendee.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.attendees.update", [$attendee->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="session_id">{{ trans('cruds.attendee.fields.session') }}</label>
                <select class="form-control select2 {{ $errors->has('session') ? 'is-invalid' : '' }}" name="session_id" id="session_id" required>
                    @foreach($sessions as $id => $entry)
                        <option value="{{ $id }}" {{ (old('session_id') ? old('session_id') : $attendee->session->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('session'))
                    <div class="invalid-feedback">
                        {{ $errors->first('session') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.attendee.fields.session_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.attendee.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $attendee->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.attendee.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="from_email">{{ trans('cruds.attendee.fields.from_email') }}</label>
                <input class="form-control {{ $errors->has('from_email') ? 'is-invalid' : '' }}" type="number" name="from_email" id="from_email" value="{{ old('from_email', $attendee->from_email) }}" step="1">
                @if($errors->has('from_email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('from_email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.attendee.fields.from_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="from_website">{{ trans('cruds.attendee.fields.from_website') }}</label>
                <input class="form-control {{ $errors->has('from_website') ? 'is-invalid' : '' }}" type="number" name="from_website" id="from_website" value="{{ old('from_website', $attendee->from_website) }}" step="1">
                @if($errors->has('from_website'))
                    <div class="invalid-feedback">
                        {{ $errors->first('from_website') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.attendee.fields.from_website_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="attended_session">{{ trans('cruds.attendee.fields.attended_session') }}</label>
                <input class="form-control {{ $errors->has('attended_session') ? 'is-invalid' : '' }}" type="number" name="attended_session" id="attended_session" value="{{ old('attended_session', $attendee->attended_session) }}" step="1">
                @if($errors->has('attended_session'))
                    <div class="invalid-feedback">
                        {{ $errors->first('attended_session') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.attendee.fields.attended_session_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="received_follow_up_email">{{ trans('cruds.attendee.fields.received_follow_up_email') }}</label>
                <input class="form-control {{ $errors->has('received_follow_up_email') ? 'is-invalid' : '' }}" type="number" name="received_follow_up_email" id="received_follow_up_email" value="{{ old('received_follow_up_email', $attendee->received_follow_up_email) }}" step="1">
                @if($errors->has('received_follow_up_email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('received_follow_up_email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.attendee.fields.received_follow_up_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="viewed_follow_up">{{ trans('cruds.attendee.fields.viewed_follow_up') }}</label>
                <input class="form-control {{ $errors->has('viewed_follow_up') ? 'is-invalid' : '' }}" type="number" name="viewed_follow_up" id="viewed_follow_up" value="{{ old('viewed_follow_up', $attendee->viewed_follow_up) }}" step="1">
                @if($errors->has('viewed_follow_up'))
                    <div class="invalid-feedback">
                        {{ $errors->first('viewed_follow_up') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.attendee.fields.viewed_follow_up_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="watched_last_session">{{ trans('cruds.attendee.fields.watched_last_session') }}</label>
                <input class="form-control {{ $errors->has('watched_last_session') ? 'is-invalid' : '' }}" type="number" name="watched_last_session" id="watched_last_session" value="{{ old('watched_last_session', $attendee->watched_last_session) }}" step="1">
                @if($errors->has('watched_last_session'))
                    <div class="invalid-feedback">
                        {{ $errors->first('watched_last_session') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.attendee.fields.watched_last_session_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="invited_to_next_session">{{ trans('cruds.attendee.fields.invited_to_next_session') }}</label>
                <input class="form-control {{ $errors->has('invited_to_next_session') ? 'is-invalid' : '' }}" type="number" name="invited_to_next_session" id="invited_to_next_session" value="{{ old('invited_to_next_session', $attendee->invited_to_next_session) }}" step="1">
                @if($errors->has('invited_to_next_session'))
                    <div class="invalid-feedback">
                        {{ $errors->first('invited_to_next_session') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.attendee.fields.invited_to_next_session_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="viewed_next_session_email">{{ trans('cruds.attendee.fields.viewed_next_session_email') }}</label>
                <input class="form-control {{ $errors->has('viewed_next_session_email') ? 'is-invalid' : '' }}" type="number" name="viewed_next_session_email" id="viewed_next_session_email" value="{{ old('viewed_next_session_email', $attendee->viewed_next_session_email) }}" step="1">
                @if($errors->has('viewed_next_session_email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('viewed_next_session_email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.attendee.fields.viewed_next_session_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="signed_up_for_next_session">{{ trans('cruds.attendee.fields.signed_up_for_next_session') }}</label>
                <input class="form-control {{ $errors->has('signed_up_for_next_session') ? 'is-invalid' : '' }}" type="number" name="signed_up_for_next_session" id="signed_up_for_next_session" value="{{ old('signed_up_for_next_session', $attendee->signed_up_for_next_session) }}" step="1">
                @if($errors->has('signed_up_for_next_session'))
                    <div class="invalid-feedback">
                        {{ $errors->first('signed_up_for_next_session') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.attendee.fields.signed_up_for_next_session_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection