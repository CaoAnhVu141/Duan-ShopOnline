<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Caterogy extends Model
{
    use HasFactory;
    use SoftDeletes;
    

    protected $table = 'caterogies'; // Tên bảng trong cơ sở dữ liệu

    protected $fillable = ['namecaterogy', 'describe'];
}
