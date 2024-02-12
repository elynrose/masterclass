@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.payment.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.payments.update", [$payment->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="stripe_transaction">{{ trans('cruds.payment.fields.stripe_transaction') }}</label>
                            <input class="form-control" type="text" name="stripe_transaction" id="stripe_transaction" value="{{ old('stripe_transaction', $payment->stripe_transaction) }}" required>
                            @if($errors->has('stripe_transaction'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('stripe_transaction') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.payment.fields.stripe_transaction_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="credit">{{ trans('cruds.payment.fields.credit') }}</label>
                            <input class="form-control" type="number" name="credit" id="credit" value="{{ old('credit', $payment->credit) }}" step="1" required>
                            @if($errors->has('credit'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('credit') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.payment.fields.credit_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="amount_paid">{{ trans('cruds.payment.fields.amount_paid') }}</label>
                            <input class="form-control" type="number" name="amount_paid" id="amount_paid" value="{{ old('amount_paid', $payment->amount_paid) }}" step="0.01" required>
                            @if($errors->has('amount_paid'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('amount_paid') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.payment.fields.amount_paid_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="user_id">{{ trans('cruds.payment.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id">
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $payment->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('user') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.payment.fields.user_helper') }}</span>
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