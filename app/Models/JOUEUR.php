<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JOUEUR extends Model
{
    protected $fillable = ['ID', 'GRADE', 'LVL', 'COINS','user_id'];
    protected $table = 'JOUEUR';
    public $timestamps = false; //by default timestamp true
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
