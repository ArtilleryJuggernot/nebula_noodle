<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = "ITEM";
    protected $fillable = ['ID', 'LIBELLE', 'CAT_ID'];

    public function itemCategory()
    {
        return $this->belongsTo(ItemCategory::class, 'CAT_ID', 'ID');
    }

}
