<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lead extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['mobile_number','district','state'];

    public function comment()
    {
        return $this->hasMany(LeadComment::class, 'lead_id', 'id');
    }

    public function stateNames(){
        return $this->hasOne(State::class,'id');
    }
}
