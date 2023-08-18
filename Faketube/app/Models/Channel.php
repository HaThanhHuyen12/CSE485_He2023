<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class channel extends Model
{
    use HasFactory;
    protected $fillable = [
        'ChannelID',
        'ChannelName',
        'Description',
        'SubscribersCount',
        'URL'
    ];
    protected $primaryKey = 'ChannelID';
}