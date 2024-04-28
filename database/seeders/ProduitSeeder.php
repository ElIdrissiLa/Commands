<?php

namespace Database\Seeders;
use App\Models\Client;
use App\Models\Produit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $clients=Client::all();
        $produit = Produit::factory()
        ->hasAttached(
            $clients,
            ['qte' => 20]
        )
        ->create();
    }
}



