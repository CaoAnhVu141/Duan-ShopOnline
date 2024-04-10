<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Caterogy;



class Product extends Model
{
    use HasFactory;

    protected $table = 'products'; // Tên bảng trong cơ sở dữ liệu

    protected $fillable = [
        'nameproduct', 
        'price', 
        'image', 
        'producer',
        'rightnow', 
        'productdescription', 
        'detailproductdescription', 
        'neworold', 
        'id_cate'
    ];

    public function category() {
        return $this->belongsTo(Caterogy::class, 'id_cate');
    }
}
