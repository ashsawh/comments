<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_Comment extends Model
{
    protected $table = "users_comments";
    public $timestamps = false;
    protected $fillable = ['user_id', 'comments_id', 'read', 'product_id'];
}