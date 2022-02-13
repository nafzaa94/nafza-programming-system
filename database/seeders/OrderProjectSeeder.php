<?php

namespace Database\Seeders;

use App\Models\OrderProject;
use Illuminate\Database\Seeder;

class OrderProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderProject::insert([
            'package_name' => "Standard Package",
            'package_price' => "RM 200",
            'package_detail' => '[{"detail":"Full Coding","image":"accept.png"},{"detail":"Learn Programming","image":"accept.png"},{"detail":"Schematic Diagram","image":"accept.png"}, {"detail":"Video","image":"decline.png"},{"detail":"Storage File Backup","image":"decline.png"},{"detail":"Preparation Of Meeting Dates At Anytime","image":"decline.png"}, {"detail":"Guide Your Project A to Z","image":"decline.png"}]',
            'package_color' => "primary",
        ]);

        OrderProject::insert([
            'package_name' => "Premium Package",
            'package_price' => "RM 300",
            'package_detail' => '[{"detail":"Full Coding","image":"accept.png"},{"detail":"Learn Programming","image":"accept.png"},{"detail":"Schematic Diagram","image":"accept.png"}, {"detail":"Video","image":"accept.png"},{"detail":"Storage File Backup","image":"accept.png"},{"detail":"Preparation Of Meeting Dates At Anytime","image":"decline.png"}, {"detail":"Guide Your Project A to Z","image":"decline.png"}]',
            'package_color' => "warning",
        ]);

        OrderProject::insert([
            'package_name' => "Business Package",
            'package_price' => "RM 400",
            'package_detail' => '[{"detail":"Full Coding","image":"accept.png"},{"detail":"Learn Programming","image":"accept.png"},{"detail":"Schematic Diagram","image":"accept.png"}, {"detail":"Video","image":"accept.png"},{"detail":"Storage File Backup","image":"accept.png"},{"detail":"Preparation Of Meeting Dates At Anytime","image":"accept.png"}, {"detail":"Guide Your Project A to Z","image":"accept.png"}]',
            'package_color' => "danger",
        ]);
    }
}
