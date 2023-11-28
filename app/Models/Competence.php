<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    use HasFactory;
    protected $table = "COMPETENCE";


    public function competenceCategory()
    {
        return $this->belongsTo(CompetenceCategory::class, 'CAT_ID', 'CAT_ID');
    }
}
