<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Lang;

class SocialMedia extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'socialmedia';

    protected $fillable = ['facebook', 'twitter', 'gplus', 'linkedin'];

}
