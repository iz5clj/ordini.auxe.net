<?php

use Illuminate\Database\Seeder;
use App\Supplier;

class SuppliersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Esselunga 
        $supplier = new Supplier;

        $supplier->nome = 'Esselunga S.p.a.';
        $supplier->indirizzo1 = 'Via del Gignoro 14';
        $supplier->citta = 'Firenze';
        $supplier->cap = '50130';
        $supplier->tel = '05545678920';
        $supplier->email = 'esse@esselunga.it';
        $supplier->agent_id = 1;

        $supplier->save();

        // Dac
        $supplier = new Supplier;

        $supplier->nome = 'DAC S.p.a.';
        $supplier->indirizzo1 = 'Via del largo';
        $supplier->citta = 'Firenze';
        $supplier->cap = '50140';
        $supplier->tel = '055895623';
        $supplier->email = 'dac@dac.it';
        $supplier->agent_id = 2;

        $supplier->save();
    }
}
