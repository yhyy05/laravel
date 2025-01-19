<?php

// app/Models/Event.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_name',
        'event_time',
    ];

    /**
     * 關聯 TradeHistory
     */
    public function tradeHistories()
    {
        return $this->hasMany(TradeHistory::class, 'events_id');
    }
}
