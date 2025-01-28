<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    protected $fillable = ['translate_key', 'local', 'content', 'tags'];
    protected $casts = [
        'tags' => 'array',
    ];
}
