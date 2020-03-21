<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "apartments";
    protected $fillable = [
        'floor', 'unit', 'unit_name', 'bed_room', 'wash_room', 'drawing_dining', 'kitchen_room', 'belcony', 'unit_size', 'unit_advance', 'monthly_rent', 'meter_no'
    ];
}
