<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(\fge\token\seeds\estadosnuc::class);
         $this->call(\fge\token\seeds\modulos::class);
         $this->call(\fge\token\seeds\nucs::class);
    }
}
