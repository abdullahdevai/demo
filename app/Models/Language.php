<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'title' => 'string',
        'name' => 'string',
    ];

    public function flagImage()
    {
        return $this->belongsTo(Media::class, 'flag');
    }
}
