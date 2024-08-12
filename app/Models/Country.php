<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    
    protected $table = 'countries';

    public function branches()
    {
        return $this->hasMany(Branch::class);
    }
}