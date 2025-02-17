<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $table = 'rooms';

    protected $primaryKey = 'id';
    protected $keyType = 'int';

    protected $fillable = [
        'name',
        'price',
        'quantity',
        'description',
        'allowd_guests',
        'size',
        'beds',
        'amenities',
        'service',
        'feature_img',
        'gallery_img',
    ];

    protected $casts = [
        'beds' => 'array',
        'amenities' => 'array',
        'service' => 'array',
        'gallery_img' => 'array',
    ];


}
