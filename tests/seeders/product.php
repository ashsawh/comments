<?php
namespace Tests\Seeders;

class Product extends AbstractSeeder
{
    protected $model = "App\\Models\\Product";
    public $sku = "uuid";
    public $name = "word";
    public $description = "paragraph";
}