<?php

use App\Language;
use Illuminate\Database\Seeder;

class LanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Language::create([
            'foldername' => 'en',
            'languagename' => 'English',
            'description' => 'English',
            'flag_name' => 'america.png',
        ]);
        Language::create([
            'foldername' => 'es',
            'languagename' => 'Español',
            'description' => 'Español',
            'flag_name' => 'spain.png',
        ]);

    }
}
