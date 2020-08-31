<?php

namespace App\Http\Requests;

use App\Customer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreCustomerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('customer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
                'required',
            ],
            'where_to'        => [
                'required',
            ],
            'driver'          => [
                'required',
            ],
            'vehicle'         => [
                'required',
            ],
        ];
    }
}
