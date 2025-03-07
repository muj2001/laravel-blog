<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post {
    public $title;
    public $excerpt;
    public $date;
    public $slug;
    public $content;

    public function __construct($title, $excerpt, $date, $slug, $content) {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->slug = $slug;
        $this->content = $content;
    }

    public static function all() {
        return cache()->rememberForever('posts.all', function() {
            return collect(File::files(resource_path("/posts")))
            ->map(fn($file) => YamlFrontMatter::parseFile($file))
            ->map(fn($document) => new Post(
                title: $document->matter('title'),
                excerpt: $document->matter('excerpt'),
                date: $document->matter('date'),
                slug: $document->matter('slug'),
                content: $document->body(),
            ));
        });
    }

    public static function find($slug) {
        return static::all() -> firstWhere('slug', $slug);

    }

    public static function findOrFail($slug) {
        $post = static::find($slug);

        if (!$post) {
            throw new ModelNotFoundException();
        }

        return $post;
    }
};