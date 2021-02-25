<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Portfolio;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
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
