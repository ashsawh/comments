<?php
namespace Tests\Seeders;


abstract class AbstractSeeder
{
    protected $faker;
    protected $item;

    function __construct()
    {
        $this->faker = \Faker\Factory::create();
        $item = new $this->model;

        foreach (call_user_func('get_object_vars', $this) as $column => $value) {
            $fakerType = $this->$column;
            $item->$column = $this->faker->$fakerType;
        }
        $this->item = $item;
    }

    public function get()
    {
        return $this->item;
    }

    public function delete()
    {
        $this->item->delete();
        return $this;
    }

    public function seed()
    {
        $this->item->save();
        return $this;
    }
}