<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TRANSACTION_MARCHE extends Model
{
    use HasFactory;
    protected $table = "TRANSACTION_MARCHE";
    protected $fillable = ["ID","Statut","DT_CREATION","DT_END","ITEM_QT","ITEM_ID","PIECE_QT","USER1_ID","USER2_ID"];
    public $timestamps = false; //by default timestamp true


    public function item()
    {
        return $this->belongsTo(Item::class, 'ITEM_ID', 'ID');
    }

    public function vendeur()
    {
        return $this->belongsTo(Joueur::class, 'USER1_ID', 'ID');
    }
}
