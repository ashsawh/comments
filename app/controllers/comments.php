<?php
namespace App\Controllers;

use \Interop\Container\ContainerInterface as ContainerInterface;
use App\Models\Product as Product;
class Comments {
    protected $ci;

    public function __construct(ContainerInterface $ci) {
        $this->ci = $ci;
    }

    public function save($request, $response, $args) {

    }

    public function index($request, $response, $args) {
        /*
        $product = new Product();
        //$product = new \stdClass();
        $product->sku = "FN-19QRT";
        $product->name = "Computer";
        $product->description = "A computer is a device that accepts information (in the form of digitalized data) and " .
            "manipulates it for some result based on a program or sequence of instructions on how the data is to be " .
            "processed. Complex computers also include the means for storing data (including the program, which is also " .
            "a form of data) for some necessary duration. A program may be invariable and built into the computer " .
            "(and called logic circuitry as it is on microprocessors) or different programs may be provided to the " .
            "computer (loaded into its storage and then started by an administrator or user). Today's computers have " .
            "both kinds of programming.";

        $product->save();
        */

        $product = Product::first();
        $commentA = new \stdClass();
        $commentA->title = "This is the first comment";
        $commentA->username = "Ford";
        $commentA->age = "12 hrs";

        $commentB = new \stdClass();
        $commentB->title = "This is the second comment";
        $commentB->username = "James";
        $commentB->age = "12 hrs";

        $comments = [ $commentA, $commentB ];
        $response = $this->ci->view->render($response, "comments.phtml", [
            "comments" => $comments,
            "product" => $product
        ]);
        return $response;
    }
}