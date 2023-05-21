<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_name',
        'number_of_beds',
        'room_rent',
        'min_stay',
        'max_stay',
        'room_image',
    ];
}
