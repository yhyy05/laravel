<?php

// app/Models/TradeHistory.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TradeHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'transaction_type',
        'status',
        'events_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'events_id');
    }
}
