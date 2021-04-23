<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class friend extends Model
{
    use HasFactory;
    protected $table = 'friend';

    protected $primaryKey = 'userid';

    protected $fillable = [
        'userid',
        'friendid'
    ];

    public static function addFriend()
    {
        $username = $_POST['username'];
        $res = User::where([
            ["name", "=", $username]
        ])->first();
        if ($res != null) {
            $friendid = $res->userid;
            $friend = new friend();
            $friend->userid = session('id');
            $friend->friendid = $friendid;
            $friend->save();
        }
    }
}
