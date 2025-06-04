<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $cities = [
            'Montreal', 'Quebec', 'Laval', 'Gatineau', 'Longueuil',
            'Sherbrooke', 'Saguenay', 'Levis', 'Trois-Rivieres', 'Terrebonne',
            'Saint-Jean-sur-Richelieu', 'Repentigny', 'Brossard', 'Drummondville', 'Saint-Jerome'
        ];
        
        foreach ($cities as $city) {
            DB::table('cities')->insert([  
                'name' => $city,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
