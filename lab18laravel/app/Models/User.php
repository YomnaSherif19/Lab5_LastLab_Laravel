<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Dotenv\Loader\Loader;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends  Authenticatable
{
    use HasFactory,SoftDeletes;
    protected $table='users';
    protected $fillable = [
        'name',
        'email',
        'password',
        
    ];
    public function posts(){
        return $this->hasMany('App\Models\Post');
    }
    // public function postsCount(){
    //     return $this->posts()
    //     ->join('post_tag,post_id,posts:id')
    //     ->selectRaw('post_id,count(distinct post_id)as total')
    //     ->groupBy('post_id');
    // }
    // public function getpostsCountAttribute(){
    // //    if(!array_key_exists('postsCount',$this->relations))
    // //        $this->load('postsCount');
    // //     $exists=$this->getRelation('postsCount')->first();
    // //    return $exists ? $exists->total:0;   
    //       return $this->posts()->count();
   
   
    //  }



    
}
