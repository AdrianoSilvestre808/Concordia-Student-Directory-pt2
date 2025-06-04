<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title_en',
        'title_fr',
        'content_en',
        'content_fr',
        'created_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getTitleAttribute()
{
    return app()->getLocale() == 'fr' ? $this->title_fr : $this->title_en;
}

public function getContentAttribute()
{
    return app()->getLocale() == 'fr' ? $this->content_fr : $this->content_en;
}
}