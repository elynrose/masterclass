@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.schedule.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.schedules.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="session_id">{{ trans('cruds.schedule.fields.session') }}</label>
                            <select class="form-control select2" name="session_id" id="session_id" required>
                                @foreach($sessions as $id => $entry)
                                    <option value="{{ $id }}" {{ old('session_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('session'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('session') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.schedule.fields.session_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="date">{{ trans('cruds.schedule.fields.date') }}</label>
                            <input class="form-control date" type="text" name="date" id="date" value="{{ old('date') }}" required>
                            @if($errors->has('date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.schedule.fields.date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="time">{{ trans('cruds.schedule.fields.time') }}</label>
                            <input class="form-control timepicker" type="text" name="time" id="time" value="{{ old('time') }}" required>
                            @if($errors->has('time'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('time') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.schedule.fields.time_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ trans('cruds.schedule.fields.status') }}</label>
                            @foreach(App\Models\Schedule::STATUS_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="status_{{ $key }}" name="status" value="{{ $key }}" {{ old('status', '') === (string) $key ? 'checked' : '' }}>
                                    <label for="status_{{ $key }}">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.schedule.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection