<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplicationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('applications')->insert([
            'name' => "spotify",
            'endpoint' => "https://api-sporify.com/",

        ]);

        DB::table('applications')->insert([
            'name' => "yoga",
            'endpoint' => "https://api-yoga.com/"
        ]);

        DB::table('applications')->insert([
            'name' => "audible",
            'endpoint' => "https://api-audible.com/"
        ]);

        DB::table('applications')->insert([
            'name' => "nike run app",
            'endpoint' => "https://api-nikerunapp.com/"
        ]);

        DB::table('applications')->insert([
            'name' => "kindle",
            'endpoint' => "https://api-kindle.com/"
        ]);

        DB::table('applications')->insert([
            'name' => "Tinder",
            'endpoint' => "https://api-Tinder.com/"
        ]);

        DB::table('applications')->insert([
            'name' => "photoapp",
            'endpoint' => "https://api-photoapp.com/"
        ]);

        DB::table('applications')->insert([
            'name' => "fitnesspal",
            'endpoint' => "https://api-fitnesspal.com/"
        ]);

        DB::table('applications')->insert([
            'name' => "pupford",
            'endpoint' => "https://api-pupford.com/"
        ]);

        DB::table('applications')->insert([
            'name' => "hotstar",
            'endpoint' => "https://api-hotstar.com/"
        ]);

        DB::table('applications')->insert([
            'name' => "grammarly",
            'endpoint' => "https://api-grammarly.com/"
        ]);

        DB::table('applications')->insert([
            'name' => "fitternity",
            'endpoint' => "https://api-fitternity.com/"
        ]);

        DB::table('applications')->insert([
            'name' => "lightroom",
            'endpoint' => "https://api-lightroom.com/"
        ]);

        DB::table('applications')->insert([
            'name' => "1mg",
            'endpoint' => "https://api-1mg.com/"
        ]);

        DB::table('applications')->insert([
            'name' => "yogawave",
            'endpoint' => "https://api-yogawave.com/"
        ]);

        DB::table('applications')->insert([
            'name' => "alomoves",
            'endpoint' => "https://api-alomoves.com/"
        ]);

        DB::table('applications')->insert([
            'name' => "ludo",
            'endpoint' => "https://api-ludo.com/"
        ]);

        DB::table('applications')->insert([
            'name' => "wakingup",
            'endpoint' => "https://api-wakingup.com/"
        ]);

        DB::table('applications')->insert([
            'name' => "meditation",
            'endpoint' => "https://api-meditation.com/"
        ]);
    }
}
