@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.customer.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.customers.update", [$customer->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="customernames">{{ trans('cruds.customer.fields.customername') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('customernames') ? 'is-invalid' : '' }}" name="customernames[]" id="customernames" multiple required>
                    @foreach($customernames as $id => $customername)
                        <option value="{{ $id }}" {{ (in_array($id, old('customernames', [])) || $customer->customernames->contains($id)) ? 'selected' : '' }}>{{ $customername }}</option>
                    @endforeach
                </select>
                @if($errors->has('customernames'))
                    <div class="invalid-feedback">
                        {{ $errors->first('customernames') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.customername_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="pickup_date">{{ trans('cruds.customer.fields.pickup_date') }}</label>
                <input class="form-control date {{ $errors->has('pickup_date') ? 'is-invalid' : '' }}" type="text" name="pickup_date" id="pickup_date" value="{{ old('pickup_date', $customer->pickup_date) }}" required>
                @if($errors->has('pickup_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pickup_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.pickup_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="pickup_time">{{ trans('cruds.customer.fields.pickup_time') }}</label>
                <input class="form-control timepicker {{ $errors->has('pickup_time') ? 'is-invalid' : '' }}" type="text" name="pickup_time" id="pickup_time" value="{{ old('pickup_time', $customer->pickup_time) }}" required>
                @if($errors->has('pickup_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pickup_time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.pickup_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="where_from">{{ trans('cruds.customer.fields.where_from') }}</label>
                <input class="form-control {{ $errors->has('where_from') ? 'is-invalid' : '' }}" type="text" name="where_from" id="where_from" value="{{ old('where_from', $customer->where_from) }}" required>
                @if($errors->has('where_from'))
                    <div class="invalid-feedback">
                        {{ $errors->first('where_from') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.where_from_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="where_to">{{ trans('cruds.customer.fields.where_to') }}</label>
                <input class="form-control {{ $errors->has('where_to') ? 'is-invalid' : '' }}" type="text" name="where_to" id="where_to" value="{{ old('where_to', $customer->where_to) }}" required>
                @if($errors->has('where_to'))
                    <div class="invalid-feedback">
                        {{ $errors->first('where_to') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.where_to_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.customer.fields.driver') }}</label>
                <select class="form-control {{ $errors->has('driver') ? 'is-invalid' : '' }}" name="driver" id="driver" required>
                    <option value disabled {{ old('driver', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Customer::DRIVER_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('driver', $customer->driver) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('driver'))
                    <div class="invalid-feedback">
                        {{ $errors->first('driver') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.driver_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="vehicle">{{ trans('cruds.customer.fields.vehicle') }}</label>
                <input class="form-control {{ $errors->has('vehicle') ? 'is-invalid' : '' }}" type="text" name="vehicle" id="vehicle" value="{{ old('vehicle', $customer->vehicle) }}" required>
                @if($errors->has('vehicle'))
                    <div class="invalid-feedback">
                        {{ $errors->first('vehicle') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.vehicle_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('wheelchair') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="wheelchair" value="0">
                    <input class="form-check-input" type="checkbox" name="wheelchair" id="wheelchair" value="1" {{ $customer->wheelchair || old('wheelchair', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="wheelchair">{{ trans('cruds.customer.fields.wheelchair') }}</label>
                </div>
                @if($errors->has('wheelchair'))
                    <div class="invalid-feedback">
                        {{ $errors->first('wheelchair') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customer.fields.wheelchair_helper') }}</span>
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