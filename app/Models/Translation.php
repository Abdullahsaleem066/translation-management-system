<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Locale;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Translation extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'key',
        'value',
        'locale_id',
    ];

    public function locale()
    {
        return $this->belongsTo(Locale::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'translation_tag');
    }
}
