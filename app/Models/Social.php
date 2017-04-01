<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $fillale = ['user_id', 'provider_user_id', 'provider'];
    protected $table = 'socials';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}