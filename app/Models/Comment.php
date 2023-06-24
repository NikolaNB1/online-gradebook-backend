<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function gradebook()
    {
        return $this->belongsTo(Gradebook::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
