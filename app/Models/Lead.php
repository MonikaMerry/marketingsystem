<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lead extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['mobile_number', 'district', 'state', 'last_contact_person'];

    public function comment()
    {
        return $this->hasMany(LeadComment::class, 'lead_id', 'id');
    }

    public function comments(){
        return $this->hasOne(LeadComment::class)->latestOfMany();
    }
    public function stateData()
    {
        return $this->belongsTo(State::class, 'state_id');
    }
    public function districtData()
    {
        return $this->belongsTo(District::class, 'district_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
