@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.subscriber.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.subscribers.update", [$subscriber->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="full_name">{{ trans('cruds.subscriber.fields.full_name') }}</label>
                            <input class="form-control" type="text" name="full_name" id="full_name" value="{{ old('full_name', $subscriber->full_name) }}" required>
                            @if($errors->has('full_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('full_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.subscriber.fields.full_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="email_address">{{ trans('cruds.subscriber.fields.email_address') }}</label>
                            <input class="form-control" type="email" name="email_address" id="email_address" value="{{ old('email_address', $subscriber->email_address) }}" required>
                            @if($errors->has('email_address'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email_address') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.subscriber.fields.email_address_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="phone_number">{{ trans('cruds.subscriber.fields.phone_number') }}</label>
                            <input class="form-control" type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', $subscriber->phone_number) }}">
                            @if($errors->has('phone_number'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('phone_number') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.subscriber.fields.phone_number_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="landing_page_id">{{ trans('cruds.subscriber.fields.landing_page') }}</label>
                            <select class="form-control select2" name="landing_page_id" id="landing_page_id" required>
                                @foreach($landing_pages as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('landing_page_id') ? old('landing_page_id') : $subscriber->landing_page->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('landing_page'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('landing_page') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.subscriber.fields.landing_page_helper') }}</span>
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