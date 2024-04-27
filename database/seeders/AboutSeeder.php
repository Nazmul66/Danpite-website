<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\About;
class AboutSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $about=new About();

        $about->about_title="# Digital solution with 3 years of experience";
        $about->about_desc="lorem5000 dolor sit amet, consectetur adipiscing elit";
        $about->about_img= "image/backend/dummy_image/about.png";
        $about->about_btn="www.joyBangla.com";

        $about->save();
    }
}
