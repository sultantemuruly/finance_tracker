<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = ['title', 'description', 'amount', 'date', 'type', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
