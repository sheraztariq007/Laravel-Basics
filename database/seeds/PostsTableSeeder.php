<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::find(1);
        
        Post::truncate();
        
        $admin->pages()->saveMany([
           new Post([
               'title' => 'Blog post 1',
               'slug' => 'blog-post-1',
               'excerpt' => 'Blog post 1 excerpt',
               'body' => 'Blog post 1 body',
           ]),
           new Post([
               'title' => 'Blog post 2',
               'slug' => 'blog-post-2',
               'excerpt' => 'Blog post 2 excerpt',
               'body' => 'Blog post 2 body',
           ]),
           new Post([
               'title' => 'Blog post 3',
               'slug' => 'blog-post-3',
               'excerpt' => 'Blog post 3 excerpt',
               'body' => 'Blog post 3 body',
           ]),
           new Post([
               'title' => 'Blog post 4',
               'slug' => 'blog-post-4',
               'excerpt' => 'Blog post 4 excerpt',
               'body' => 'Blog post 4 body',
           ]),
        ]);
        
        
    }
}
