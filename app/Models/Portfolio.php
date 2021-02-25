<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Certificate;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Skill;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id'
    ];         
    
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function certificates() {
        return $this->hasMany(Certificate::class);
    }

    public function experiences() {
        return $this->hasMany(Experience::class);
    }

    public function skills() {
        return $this->hasMany(Skill::class);
    }

    public function education() {
        return $this->hasMany(Education::class);
    }
}
