<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'rate',
        'status',
        'desired_date',
    ];

    protected $dates = [
        'desired_date'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function scopeOpen($query) {
        return $query->where('status', '=', 'open');
    }
}
