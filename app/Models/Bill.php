<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = [
        'provider_id',
        'consumer_id',
        'amount',
        'status'
    ];

    public function provider()
    {
        return $this->belongsTo(User::class, 'provider_id');
    }
}
