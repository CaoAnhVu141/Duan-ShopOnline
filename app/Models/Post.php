<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $table = "posts";

    // protected $fillable = ['namepost,maincontent,author,status,id_cate'];
    protected $fillable = ['namepost', 'maincontent', 'author', 'status', 'id_cate'];


    public function caterogy()
    {
        return $this->belongsTo(CateArticle::class,'id_cate');
    }
}
