<?php

namespace Database\Seeders;

use App\Models\GeneralSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneralSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $vendor = new GeneralSetting();
        $vendor->site_name = 'fashion';
        $vendor->layout = 'LTR';
        $vendor->contact_email = 'contact@fashion.com';
        $vendor->contact_phone = '+69522145000001';
        $vendor->contact_address = 'IND';
        $vendor->currency_name = 'INR';
        $vendor->currency_icon = '₹';
        $vendor->time_zone = 'Asia/Kolkata';
        $vendor->save();
    }
}
