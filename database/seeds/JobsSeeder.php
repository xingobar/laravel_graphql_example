<?php

use Illuminate\Database\Seeder;

class JobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Jobs::truncate();
        factory(\App\Models\Jobs::class, 30)->create();
    }
}
