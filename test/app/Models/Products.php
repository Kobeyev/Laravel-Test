<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'producer_id',
    ];

    public function producer(){
        return $this->belongsTo(Producer::class, 'producer_id', 'id');
    }
}
