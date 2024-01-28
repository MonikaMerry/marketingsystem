<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadComment extends Model
{
    use HasFactory;

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }

    public function userNames()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
