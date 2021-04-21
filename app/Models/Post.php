<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Arr;
use phpDocumentor\Reflection\Types\This;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;

class Post
{

    public $title;
    public $excrept;
    public $date;
    public $body;

    public function __construct($title, $excrept, $date, $body)
    {
        $this->excrept = $excrept;
        $this->date = $date;
        $this->title = $title;
        $this->body = $body;
    }

    public static function find($slug)
    {
        $posts = static::all();
        foreach ($posts as $post) {
            if ($post->title == $slug) {
                return $post;
            }
        }
        throw new ModelNotFoundException();
    }
    public static function all()
    {
        return cache()->rememberForever('posts.all', function () {
            $files =  File::files(resource_path("/posts"));

            $posts = [];

            foreach ($files as $file) {
                $document = YamlFrontMatter::parseFile($file);
                $posts[] = new Post($document->title, $document->excerpt, $document->date, $document->body());
            }
            rsort($posts);

            return $posts;
        });
    }
}
