<?php

namespace Database\Seeders;

use App\Models\StoryProject;
use Illuminate\Database\Seeder;

class StoryProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StoryProject::insert([
            "Title_Project" => "SMART BUS CARD",
            "Link_Video_Project" => "https://www.youtube.com/embed/YhvjZUoH3bM",
            "Project_From" => "POLITEKNIK UNGKU OMAR",
            "Link_File_Project" => "https://github.com/nafzaa94/smart-bus-card-puo-",
            "FeedbacK_project" => "4.5/5",
            "Type_Programming_project" => "Arduino, html, css, laravel, mysqli",
            "id_projectfrom_taget" => "#projectfrom1",
            "id_projectfrom" => "projectfrom1",
            "id_projectlink_taget" => "#projectlink1",
            "id_projectlink" => "projectlink1",
            "id_projecttypeprogramming_taget" => "#projecttypeprogramming1",
            "id_projecttypeprogramming" => "projecttypeprogramming1",
            "id_projectfeedback_taget" => "#projectfeedback1",
            "id_projectfeedback" => "projectfeedback1",
        ]);

        StoryProject::insert([
            "Title_Project" => "SMART HEALTH MONITORING DEVICE",
            "Link_Video_Project" => "https://www.youtube.com/embed/rPS_dEDuA2Y",
            "Project_From" => "POLITEKNIK UNGKU OMAR",
            "Link_File_Project" => "https://github.com/nafzaa94/project-puo-smart-health-monitoring-devide",
            "FeedbacK_project" => "5/5",
            "Type_Programming_project" => "Arduino, html, css, laravel, mysqli",
            "id_projectfrom_taget" => "#projectfrom2",
            "id_projectfrom" => "projectfrom2",
            "id_projectlink_taget" => "#projectlink2",
            "id_projectlink" => "projectlink2",
            "id_projecttypeprogramming_taget" => "#projecttypeprogramming2",
            "id_projecttypeprogramming" => "projecttypeprogramming2",
            "id_projectfeedback_taget" => "#projectfeedback2",
            "id_projectfeedback" => "projectfeedback2",
        ]);
    }
}
