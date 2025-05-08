<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $table='pictures';
    protected $fillable=['image',];
    public function users(){
       return  $this->belongsTo(User::class,'user_id');
    }

}
