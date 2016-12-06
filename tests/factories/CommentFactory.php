<?php
namespace Tests\Factories;

use Tests\Seeders\User as User;
use Tests\Seeders\Comment as Comment;
use Tests\Seeders\Product as Product;
use App\Models\User_Comment as User_Comment;

class CommentFactory
{
    protected $models = [];

    function __construct()
    {
        $user = (new User())->seed()->get();
        $product = (new Product())->seed()->get();
        $comments[] = (new Comment())->seed()->get();
        $comments[] = (new Comment())->seed()->get();
        $comments[] = (new Comment())->seed()->get();

        $models = array_merge([$user, $product], $comments);

        foreach ($comments as $comment) {
            $userComment = new User_Comment();
            $userComment->user_id = $user->id;
            $userComment->product_id = $product->id;
            $userComment->comment_id = $comment->id;
            $userComment->save();
            $models[] = $userComment;
        }
        $this->models = $models;
    }

    public function clear()
    {
        foreach ($this->models as $model) {
            $model->delete();
        }
        $this->models = [];
    }
}