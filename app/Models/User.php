<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class User extends Model
{
    use HasFactory;

    protected $table = 'user';

    protected $primaryKey = 'userid';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public static function loginAuthentication()
    {
        $email = $_POST['email'];
        $pass = $_POST['password'];

        $res = User::where([
            ["email", "=", $email]
        ])->first();

        if ($res != null) {
            if(hash::check($pass,$res->password)){
                session(['id' => $res->userid]);
                session(['username' => $res->name]);
                return true;
            }else{
                return false;
            } 
        }else{
            return false;
        } 

    }
}
