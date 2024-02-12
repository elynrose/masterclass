@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.subscriber.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.subscribers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.subscriber.fields.id') }}
                        </th>
                        <td>
                            {{ $subscriber->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subscriber.fields.full_name') }}
                        </th>
                        <td>
                            {{ $subscriber->full_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subscriber.fields.email_address') }}
                        </th>
                        <td>
                            {{ $subscriber->email_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subscriber.fields.phone_number') }}
                        </th>
                        <td>
                            {{ $subscriber->phone_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subscriber.fields.provided_phone') }}
                        </th>
                        <td>
                            {{ $subscriber->provided_phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subscriber.fields.signed_up') }}
                        </th>
                        <td>
                            {{ $subscriber->signed_up }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subscriber.fields.read_page_contents') }}
                        </th>
                        <td>
                            {{ $subscriber->read_page_contents }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.subscriber.fields.landing_page') }}
                        </th>
                        <td>
                            {{ $subscriber->landing_page->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.subscribers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection