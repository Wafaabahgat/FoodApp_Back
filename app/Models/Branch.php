<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $table = 'branches';
    
    protected $fillable = [
        'restaurant_id',
        'country_id',
        'city',
        'name',
        'address',
        'phone'
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
    
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}