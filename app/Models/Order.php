<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'restaurant_id',
        'status',
        'total_amount',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
    

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

}