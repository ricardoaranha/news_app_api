<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\News;
use App\Models\Tags;

class NewsTags extends Model
{
    protected $table = "news_tags";
    protected $primaryKey = "id";

    protected $fillable = [
        'news_id',
        'tag_id'
    ];

    public $timestamps = false;

    public function news()
    {
        return $this->belongsTo(News::class, 'id');
    }

    public function tags()
    {
        return $this->belongsTo(Tags::class, 'id');
    }
}
