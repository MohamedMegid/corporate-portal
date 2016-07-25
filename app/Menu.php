<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'menus';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];
    public function links()
    {
       return $this->hasMany('App\MenuLink', 'menu_id')->orderBy('order', 'ASC');
    }

    public function parents()
    {
       return $this->hasMany('App\MenuLink')->where('parent', '=', '0')->orderBy('order', 'ASC');
    }
    public function parents_db($id)
    {
       // dd($id);
       return $this->belongsTo('App\MenuLink')->where('parent', '=', $id)->orderBy('order', 'ASC');
    }
    public function childrens()
    {
       
       return $this->hasMany('App\MenuLink')->where('parent', '>', '0')->orderBy('order', 'ASC');
    }
}
