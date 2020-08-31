<?php

namespace App\Http\Requests;

use App\Booking;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBookingRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('booking_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'first_name'     => [
                'string',
                'required',
            ],
            'address_line_1' => [
                'string',
                'required',
            ],
            'address_line_2' => [
                'string',
                'required',
            ],
            'town'           => [
                'string',
                'required',
            ],
            'county'         => [
                'string',
                'required',
            ],
            'post_code'      => [
                'string',
                'required',
            ],
            'contact_number' => [
                'string',
                'nullable',
            ],
        ];
    }
}
