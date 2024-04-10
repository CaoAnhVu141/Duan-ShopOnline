<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CateArticle extends Model
{
    use HasFactory;

    protected $table = "articlecategory";
    protected $fillable = ['nameartical','articaldescription'];
}
