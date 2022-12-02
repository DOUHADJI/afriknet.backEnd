<?php

namespace Database\Seeders;

use App\Models\Offer;
use Illuminate\Database\Seeder;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Offer::create([         
                'type' => 'Internet',
                'name' => 'Easy Surfing',
                'price' => 15000 
        ]);

        Offer::create([      
                'type' => 'Tv',
                'name' => 'Impression',
                'price' => 10000 
        ]);

        Offer::create([   
                'type' => 'Internet + Tv',
                'name' => 'Home Comfort',
                'price' => 25000 
        ]);

        Offer::create([
                'type' => 'Internet + Tv + Phone',
                'name' => 'Afri Premium',
                'price' => 40000 
        ]);
    }
}
