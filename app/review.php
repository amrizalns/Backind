<?php

namespace App;
use App\business;

use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    protected $primaryKey = 'id_review';
    protected $fillable = [
        'id_business',
        'id_user',
        'review',
        'response',
        'rating'
    ];

    public function business()
    {
        return $this->belongsTo(business::class, 'id_business', 'id_business');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
