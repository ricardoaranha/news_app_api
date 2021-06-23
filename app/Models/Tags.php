<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\NewsTags;

class Tags extends Model
{
    protected $table = "tags";
    protected $primaryKey = "id";

    protected $fillable = [
        'name'
    ];

    public $timestamps = false;

    public function news()
    {
        return $this->hasMany(NewsTags::class, 'tag_id');
    }
}
