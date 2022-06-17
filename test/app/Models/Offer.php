<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'producer_name',
        'price_from',
        'price_to',
        'product_name',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function producer(){
        return $this->belongsTo(Producer::class, 'name', 'producer_name');
    }
}
