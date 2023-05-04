<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\MotivoContato;

class MotivoContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MotivoContato::create(['motivo' => 'Dúvida']);
        MotivoContato::create(['motivo' => 'Elogio']);
        MotivoContato::create(['motivo' => 'Reclamação']);
    }
}
