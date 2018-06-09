<?php

namespace App\Models\Game;

use Illuminate\Database\Eloquent\Model;

class UserTicket extends Model
{
    protected $connection = 'sqlsrv1';
    protected $table = 'UserTicket';

    protected $fillable = [
        'UserID',
        'ActorID',
        'Flag',
        'SafeFlag',
        'SafeID',
        'TotalTicket'
    ];
    public $timestamps = false;
}
