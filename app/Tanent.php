<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tanent extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "tanents";
    protected $fillable = [
        'name', 'contact_no', 'email', 'id_type', 'id_no'
    ];
}
