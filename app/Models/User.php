<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function uptadeProfile($id,array $data){
        DB::table('users')->select('deleted_at')->where('id', $id)->update($data);
    }

    public function getAllEmails(){
        DB::table('users')->select('email')->whereNull('deleted_at')->get();
    }

    public static function treatData(array $data){
            $data['password'] = Hash::make($data['password']);

            return $data;
    }

    public static function profileUpdate($id,$data)
    {
        return  DB::table('users')->whereNull('deleted_at')->where('id', $id)->update($data);
    }
}
