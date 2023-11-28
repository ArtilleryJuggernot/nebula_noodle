<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetenceCategory extends Model
{
    use HasFactory;
    protected $table = "COMPETENCE_CAT";
    protected $primaryKey = "CAT_ID";


    public function competences()
    {
        return $this->hasMany(Competence::class, 'CAT_ID', 'CAT_ID');
    }
}
