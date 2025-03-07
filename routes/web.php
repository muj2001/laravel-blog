<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

Route::get('/', function () {
    // $posts = Post::all();

    // // dd($posts);
    
    // $posts = array_map(function($file) {
        //     $document = YamlFrontMatter::parseFile($file);
        
        //     return new Post(
            //         title: $document->matter('title'),
            //         excerpt: $document->matter('excerpt'),
            //         date: $document->matter('date'),
            //         slug: $document->matter('slug'),
            //         content: $document->body(),
            //     );
            // }, File::files(resource_path("/posts")));
            
            
            // dd($posts);
    return view('posts', [
        'posts' => Post::all()
    ]);
            
});

Route::get('/posts/{post}', function ($slug) {
    $post = Post::where('slug', $slug)->first();
    // Trying to find a post using postName, and then render view with that post.
    return view('post', [
        'post' => $post
    ]);
    // if (!file_exists($path = __DIR__ . "/../resources/posts/{$postName}.html")) {
    //     // return redirect("/");
    //     dd("file does not exist!"); // DUMP AND DIE ddd does not exist anymore

    //     // abort(404); // One option, abort and raise error 404 Not Found Page
    //     // return redirect("/");
    // }

    // $post = cache()->remember("posts.{$postName}", now()->addSeconds(10), fn() => file_get_contents($path));
    // // var_dump("file_get_contents"); // Outputs when cache expires, as this function is called after the cache expires
    // // The line above was in the function above before we converted it into an arrow function
    
    // return view('post', [
    //     'post'=> $post
    // ]);
});

Route::get('/test-json', function () {
    return ["name" => "Usman Jehangir" ];
});