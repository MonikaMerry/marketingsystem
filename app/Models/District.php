<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $fillable = ['id','district','state_id'];


    public function states(){
        return $this->belongsTo(State::class,'state_id');
    }
}
