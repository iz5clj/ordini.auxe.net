<?php

use Illuminate\Database\Seeder;
use App\Agent;

class AgentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // agente per Esselunga
        $agent = new Agent;

        $agent->nome = 'Matias';
        $agent->cognome = 'Sabatino';
        $agent->tel = '055 2340586';
        $agent->email = 'matias@auxe.net';
        $agent->email2 = 'ms@auxe.net';

        $agent->save();

        // agente per DAC
        $agent = new Agent;

        $agent->nome = 'Stefano';
        $agent->cognome = 'Mannari';
        $agent->tel = '055 2340586';
        $agent->email = 'stefano@dac.it';

        $agent->save();
    }
}
