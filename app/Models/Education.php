<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Portfolio;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'school',
        'course',
        'portfolio_id',
        'to',
        'from',
    ];

    protected $dates = [
        'to',
        'from'
    ];

    public function portfolio() {
        return $this->belongsTo(Portfolio::class);
    }
}
