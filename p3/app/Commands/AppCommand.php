<?php

namespace App\Commands;

use Faker\Factory;

class AppCommand extends Command
{

    public function fresh(){
        $this->migrate();
        $this->seed();
    }
    public function migrate(){
        # Note that the *createTable* method automatically adds an auto-incrementing 
        # primary key column named `id` so you don’t have to include that in your array of columns.
        $this->app->db()->createTable('rounds', [
        'bet' => 'int',
        'won' => 'tinyint(1)',
        'timestamp' => 'timestamp'
        ]);
    }

    public function seed(){

        $faker = Factory::create();

        $this->app->db()->insert('rounds', [
            'bet' => 5,
            'won' => 1,
            'timestamp' => $faker->dateTime('now')->format('Y-m-d H:i:s')
        ]);

        $this->app->db()->insert('rounds', [
            'bet' => 50,
            'won' => 0,
            'timestamp' => $faker->dateTime('now')->format('Y-m-d H:i:s')
        ]);

        $this->app->db()->insert('rounds', [
            'bet' => 500,
            'won' => 1,
            'timestamp' => $faker->dateTime('now')->format('Y-m-d H:i:s')
        ]);
    }
}