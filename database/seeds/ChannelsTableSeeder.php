<?php

use Illuminate\Database\Seeder;
use App\Channel;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channel1 = ['title' => 'Laravel', 'slug' => str_slug('Laravel')];
        $channel2 = ['title' => 'Vuejs', 'slug' => str_slug('Vuejs')];
        $channel3 = ['title' => 'CSS', 'slug' => str_slug('CSS')];
        $channel4 = ['title' => 'HTML', 'slug' => str_slug('HTML')];
        $channel5 = ['title' => 'JavaScript', 'slug' => str_slug('JavaScript')];
        $channel6 = ['title' => 'PHP', 'slug' => str_slug('PHP')];
        $channel7 = ['title' => 'Codeigniter', 'slug' => str_slug('Codeigniter')];
        $channel8 = ['title' => 'zend', 'slug' => str_slug('zend')];
        $channel9 = ['title' => 'Symphony', 'slug' => str_slug('Symphony')];

        Channel::create($channel1);
        Channel::create($channel2);
        Channel::create($channel3);
        Channel::create($channel4);
        Channel::create($channel5);
        Channel::create($channel6);
        Channel::create($channel7);
        Channel::create($channel8);
        Channel::create($channel9);
    }
}
