<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    const CREATED_AT = "create_date";
    const UPDATED_AT = "update_date";

    protected $fillable = ['name', 'sku', 'description'];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'users_comments');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'users_comments');
    }
}