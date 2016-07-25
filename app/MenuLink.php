<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuLink extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'menus_links';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['menu_id', 'icon', 'title', 'link', 'target', 'has_children', 'parent', 'order'];
}
