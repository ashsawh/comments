<?php
namespace App\Controllers;

use \Interop\Container\ContainerInterface as ContainerInterface;
use App\Models\Product as Product;
use App\Models\User_Comment as User_Comment;
use App\Models\Comment as Comment;
use App\Models\User as User;

class Comments {
    protected $ci;

    public function __construct(ContainerInterface $ci)
    {
        $this->ci = $ci;
    }

    public function save($request, $response, $args)
    {
        $parsedBody = $request->getParsedBody();
        $comment = new Comment();
        $comment->content = $parsedBody['content'];
        $comment->title = $parsedBody['title'];
        $comment->save();

        $user_comment = new User_Comment();
        $user_comment->user_id = $parsedBody['userId'];
        $user_comment->product_id = $parsedBody['productId'];
        $user_comment->comment_id = $comment->id;
        $user_comment->save();

        return $user_comment->id ? 1 : 0;
    }

    public function index($request, $response, $args)
    {
        $product = Product::first();
        $comments = Comment::all();
        $user = User::first();

        $response = $this->ci->view->render($response, "comments.phtml", [
            "comments" => $comments,
            "product" => $product,
            "user" => $user
        ]);

        return $response;
    }
}