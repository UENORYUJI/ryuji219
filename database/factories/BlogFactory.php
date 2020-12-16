<?php

namespace Database\Factories;

// use App\Models\Model;
use App\Models\Blog;
use Faker\Genrerator as Faker;


$factory->define(Blog::Class ,function(Faker $faker){
    return [
        'title' => $faker -> word,
        'content' => $faker -> realText
    ];
});
