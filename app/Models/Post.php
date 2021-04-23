<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'post';

    protected $primaryKey = 'postid';

    protected $fillable = [
        'content',
        'userid',
        'username',
    ];

    public static function findAll()
    {
        $friends = friend::where("userid", "=", session('id'))->get();

        $allposts = [];
        $x = 0;
        foreach ($friends as $friend) {
            $posts = Post::where('userid', '=', $friend->friendid)->get();
            foreach ($posts as $post) {
                $allposts[$x++] = $post;
            }
        }
        return $allposts;
    }

    public static function createPost(){
        $content = $_POST['content'];
        $post = new Post();
        $post->userid = session('id');
        $post->content = $content;
        $post->username = session('username');
        $post->save();
    }
}
