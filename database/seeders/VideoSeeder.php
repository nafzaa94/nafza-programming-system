<?php

namespace Database\Seeders;

use App\Models\Video;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Video::insert([
            "Categories_video" => "Arduino",
            "Id_video" => "arduino1",
            "Id_Video_Taget" => "#arduino1",
            "Title_video" => "INSTALL ARDUINO IDE",
            "Link_video" => "https://www.youtube.com/embed/kHU7EuA2rGg",
        ]);

        Video::insert([
            "Categories_video" => "Arduino",
            "Id_video" => "arduino2",
            "Id_Video_Taget" => "#arduino2",
            "Title_video" => 'INSTALL DRIVER AND BAORD',
            "Link_video" => 'https://www.youtube.com/embed/R8NIf_UfZB4',
        ]);

        Video::insert([
            "Categories_video" => "Javascritp",
            "Id_video" => "javascritp1",
            "Id_Video_Taget" => "#javascritp1",
            "Title_video" => 'WHAT IS JAVASCRITP',
            "Link_video" => 'https://www.youtube.com/embed/hdI2bqOjy3c',
        ]);

        Video::insert([
            "Categories_video" => "PHP",
            "Id_video" => "php1",
            "Id_video_taget" => "#php1",
            "Title_video" => 'WHAT IS PHP',
            "Link_video" => 'https://www.youtube.com/embed/2eebptXfEvw',
        ]);

    }
}
