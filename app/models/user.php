<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    const CREATED_AT = "create_date";
    const UPDATED_AT = "update_date";

    protected $fillable = ['username', 'password'];

    public function products()
    {
        return $this->hasMany('App\Models\Product', 'users_comments');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'users_comments');
    }
}