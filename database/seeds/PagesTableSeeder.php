<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Page;
class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::find(1);
        
        Page::truncate();
        
        
        $admin->pages()->saveMany([
            new Page([
                'title'=>'About',
                'url'=>'/about',
                'content'=>'this is about us',
            ]),
            new Page([
                'title'=>'Contact',
                'url'=>'/contact',
                'content'=>'you can contact us',
            ]),
            new Page([
                'title'=>'Another Page',
                'url'=>'/another-page',
                'content'=>'this is another page',
            ]),
        ]);
    }
}
