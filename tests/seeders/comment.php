<?php
namespace Tests\Seeders;

class Comment extends AbstractSeeder
{
    protected $model = "App\\Models\\Comment";
    public $content = "paragraph";
    public $title = "sentence";
}