<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';

    protected $fillable = ['title', 'description', 'status'];

    public function reply(){
        return $this->hasMany('App\TicketReply', 'ticket_id');   
    }
}
