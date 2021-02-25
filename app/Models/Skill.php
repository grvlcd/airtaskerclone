<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Portfolio;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'portfolio_id',
    ];

    public function portfolio() {
        return $this->belongsTo(Portfolio::class);
    }
}
