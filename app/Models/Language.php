<?php

namespace App\Models;

use App\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Language extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'flag'  => 'integer',
        'title' => 'string',
        'name'  => 'string',
    ];

    public function flag()
    {
        return $this->belongsTo(Media::class,'flag');
    }
}
