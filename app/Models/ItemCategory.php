<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    use HasFactory;
    protected $table = "ITEM_CAT";


    public function items()
    {
        return $this->hasMany(Item::class, 'CAT_ID', 'ID');
    }
}
