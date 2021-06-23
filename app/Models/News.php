<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\NewsTags;

class News extends Model
{
    use SoftDeletes;

    protected $table = "news";
    protected $primaryKey = "id";

    protected $fillable = [
        'banner',
        'title',
        'content',
        'is_published',
    ];

    protected $hidden = [
        'votes'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function tags()
    {
        return $this->hasMany(NewsTags::class, 'news_id');
    }
}
