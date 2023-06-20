<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('todos')->insert([
            'task' => 'Linux tanulás',
            'done' => '0'
        ]);
        
        DB::table('todos')->insert([
            'task' => 'Bootstrap tanulás',
            'done' => '0'
        ]);

        DB::table('todos')->insert([
            'task' => 'CSS tanulás',
            'done' => '0'
        ]);
    }
}
