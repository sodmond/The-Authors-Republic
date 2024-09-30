<?php

namespace Database\Seeders;

use App\Models\Shipping;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShippingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = [
            ['state' =>          'Abuja'],
            ['state' =>          'Abia'],
            ['state' =>          'Adamawa'],
            ['state' =>          'Akwa Ibom'],
            ['state' =>          'Anambra'],
            ['state' =>          'Bauchi'],
            ['state' =>          'Bayelsa'],
            ['state' =>          'Benue'],
            ['state' =>          'Borno'],
            ['state' =>          'Cross River'],
            ['state' =>          'Delta'],
            ['state' =>          'Ebonyi'],
            ['state' =>          'Edo'],
            ['state' =>          'Ekiti'],
            ['state' =>          'Enugu'],
            ['state' =>          'Gombe'],
            ['state' =>          'Imo'],
            ['state' =>          'Jigawa'],
            ['state' =>          'Kaduna'],
            ['state' =>          'Kano'],
            ['state' =>          'Katsina'],
            ['state' =>          'Kebbi'],
            ['state' =>          'Kogi'],
            ['state' =>          'Kwara'],
            ['state' =>          'Lagos'],
            ['state' =>          'Nassarawa'],
            ['state' =>          'Niger'],
            ['state' =>          'Ogun'],
            ['state' =>          'Ondo'],
            ['state' =>          'Osun'],
            ['state' =>          'Oyo'],
            ['state' =>          'Plateau'],
            ['state' =>          'Rivers'],
            ['state' =>          'Sokoto'],
            ['state' =>          'Taraba'],
            ['state' =>          'Yobe'],
            ['state' =>          'Zamfara']
        ];
        Shipping::insert($states);
    }
}
