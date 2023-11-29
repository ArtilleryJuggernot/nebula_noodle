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


    public function joueurs()
    {
        return $this->belongsToMany(Joueur::class, 'POSSEDE_ITEMS', 'ITEM_ID', 'USER_ID')
            ->withPivot('NB_items');
    }

    public function categorie()
    {
        return $this->belongsTo(ITEM_CAT::class, 'CAT_ID', 'ID');
    }
}
