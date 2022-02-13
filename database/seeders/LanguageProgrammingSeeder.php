<?php

namespace Database\Seeders;

use App\Models\LanguageProgramming;
use Illuminate\Database\Seeder;

class LanguageProgrammingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return voi
     */
    public function run()
    {
        LanguageProgramming::insert([
            "nameprogram" => "C++ Programming",
        ]);

        Languageprogramming::insert([
            "nameprogram" => "Python Programming",
        ]);

        Languageprogramming::insert([
            "nameprogram" => "Javascript Programming",
        ]);

        Languageprogramming::insert([
            "nameprogram" => "Arduino Programming",
        ]);

        Languageprogramming::insert([
            "nameprogram" => "PHP Programming",
        ]);

        Languageprogramming::insert([
            "nameprogram" => "HTML Programming",
        ]);

        Languageprogramming::insert([
            "nameprogram" => "CSS Programming",
        ]);
    }
}
