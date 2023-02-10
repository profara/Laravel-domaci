<?php

namespace Database\Seeders;

use App\Models\Ad;
use App\Models\Promotion;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::truncate();
        Type::truncate();
        Promotion::truncate();


        $user1 = User::create(['name' => 'Aleksa', 'email' => 'aleksa@gmail.com', 'password' => bcrypt('aleksa123'), 'address' => 'Beograd']);
        $user2 = User::create(['name' => 'Milos', 'email' => 'milos@gmail.com', 'password' => bcrypt('milos123'), 'address' => 'Novi Sad']);
        $user3 = User::create(['name' => 'Petar', 'email' => 'petar@gmail.com', 'password' => bcrypt('petar123'), 'address' => 'Nis']);

        $type1 = Type::create(['nazivTipa' => 'Alat']);
        $type2 = Type::create(['nazivTipa' => 'Obuca']);
        $type3 = Type::create(['nazivTipa' => 'Bicikle']);

        $ad1 = Ad::create([
            'naslov' => 'Prodajem MTB',
            'cena' => 12000,
            'opis' => 'Kao nov',
            'pregledi' => 10,
            'type_id' => $type3->id,
            'user_id' => $user1->id

        ]);
        $ad2 = Ad::create([
            'naslov' => 'Prodajem alat',
            'cena' => 5000,
            'opis' => 'Cena u opisu',
            'pregledi' => 15,
            'type_id' => $type1->id,
            'user_id' => $user2->id
        ]);
        $ad3 = Ad::create([
            'naslov' => 'Prodajem patike',
            'cena' => 7000,
            'opis' => 'Broj 44',
            'pregledi' => 40,
            'type_id' => $type2->id,
            'user_id' => $user3->id
        ]);


        $prom1 = Promotion::create(['nazivPromocije' => 'Premium oglas', 'cena' => 1500, 'ad_id' => $ad1->id]);
        $prom2 = Promotion::create(['nazivPromocije' => 'Na vrh', 'cena' => 2000, 'ad_id' => $ad1->id]);
        $prom3 = Promotion::create(['nazivPromocije' => 'Zlatan oglas', 'cena' => 3000, 'ad_id' => $ad2->id]);
    }
}
