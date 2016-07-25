<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketReply extends Model
{
    protected $table = 'tickets_reply';

    protected $fillable = ['reply', 'user_id', 'ticket_id'];

    public function reply(){
        return $this->belongsTo('App\Ticket', 'ticket_id');   
    }
}
