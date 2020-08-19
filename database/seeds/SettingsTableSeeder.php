<?php
use App\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Setting::truncate();
        $settings =  [
            [
                'setting_name' => 'Discount',
                'setting_value' => '10',
            ],
            [
                'setting_name' => 'Order Limit',
                'setting_value' => '20',
            ]
        ];

        foreach($settings as $setting){
            Setting::create($setting);
        }
    }
}
