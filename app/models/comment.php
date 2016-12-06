<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    const CREATED_AT = "create_date";
    const UPDATED_AT = "update_date";

    protected $fillable = ['content', 'title'];

    public function product()
    {
        return $this->belongsToMany('App\Models\Product', 'users_comments');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'users_comments');
    }
}