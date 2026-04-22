<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'name' => 'string',
        'extension' => 'string',
        'src' => 'string',
        'path' => 'string',
        'type' => 'string',
    ];

    public function image(): Attribute
    {
        $image = asset('favicon.ico');

        return Attribute::make(
            get: function () use ($image) {
                if ($this->path) {
                    return asset('storage/'.$this->path);
                }

                if ($this->src) {
                    return asset($this->src);
                }

                return $image;
            },
        );
    }
}
