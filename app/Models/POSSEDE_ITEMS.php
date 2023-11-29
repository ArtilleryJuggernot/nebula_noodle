<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class POSSEDE_ITEMS extends Model
{
    use HasFactory;

    public function joueur()
    {
        return $this->belongsTo(Joueur::class, 'USER_ID', 'ID');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'ITEM_ID', 'ID');
    }
}
