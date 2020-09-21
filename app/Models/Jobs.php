<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    protected $table = 'jobs';

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
