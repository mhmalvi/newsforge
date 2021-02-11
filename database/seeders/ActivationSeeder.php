<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Activation;

class ActivationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Activation::create([
            'type' => 'maintenance',
            'status' => '0'
        ]);
    }
}
