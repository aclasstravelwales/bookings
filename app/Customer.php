<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Customer extends Model
{
    use SoftDeletes;

    public $table = 'customers';

    const DRIVER_SELECT = [
        'Nikki' => 'Nikki',
        'Baz'   => 'Baz',
    ];

    protected $dates = [
        'pickup_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'pickup_date',
        'pickup_time',
        'where_from',
        'where_to',
        'driver',
        'vehicle',
        'wheelchair',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function customernames()
    {
        return $this->belongsToMany(Booking::class);
    }

    public function getPickupDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setPickupDateAttribute($value)
    {
        $this->attributes['pickup_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
