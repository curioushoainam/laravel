<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    // link this model to the table sanpham on the database
    protected $table = "sanpham";
    public $timestamps = false;

    public function loaisanpham(){
    	return $this->belongsTo('\App\loaisanpham','lsp_id','id');
    }
}
