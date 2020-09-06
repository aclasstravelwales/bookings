<?php

namespace App\Http\Requests;

use App\Customer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCustomerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('customer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'customernames.*' => [
                'integer',
            ],
            'customernames'   => [
                'required',
                'array',
            ],
            'pickup_date'     => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'pickup_time'     => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'where_from'      => [
                'string',
                'required',
            ],
            'where_to'        => [
                'string',
                'required',
            ],
            'vehicle'         => [
                'string',
                'nullable',
            ],
        ];
    }
}
