<?php

use Illuminate\Database\Seeder;
use App\Model\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
    		[ 'title' => 'Artikel Pertama' , 'body' => 'Isi Artikel' ],
    		[ 'title' => 'Artikel Kedua' , 'body' => 'Isi Artikel']
        ];

        foreach ($posts as $post) {
        	Post::create($post);
        }
    }
}
