<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LrtHome extends Model
{
    use HasFactory;

    protected $fillable = [
        'retrieved',
        'contents'
    ];
}
