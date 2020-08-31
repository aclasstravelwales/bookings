@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.customer.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.customers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.id') }}
                        </th>
                        <td>
                            {{ $customer->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.customername') }}
                        </th>
                        <td>
                            @foreach($customer->customernames as $key => $customername)
                                <span class="label label-info">{{ $customername->first_name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.pickup_date') }}
                        </th>
                        <td>
                            {{ $customer->pickup_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.pickup_time') }}
                        </th>
                        <td>
                            {{ $customer->pickup_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.where_from') }}
                        </th>
                        <td>
                            {{ $customer->where_from }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.where_to') }}
                        </th>
                        <td>
                            {{ $customer->where_to }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.driver') }}
                        </th>
                        <td>
                            {{ App\Customer::DRIVER_SELECT[$customer->driver] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.vehicle') }}
                        </th>
                        <td>
                            {{ $customer->vehicle }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.wheelchair') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $customer->wheelchair ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.created_at') }}
                        </th>
                        <td>
                            {{ $customer->created_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.updated_at') }}
                        </th>
                        <td>
                            {{ $customer->updated_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customer.fields.deleted_at') }}
                        </th>
                        <td>
                            {{ $customer->deleted_at }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.customers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection