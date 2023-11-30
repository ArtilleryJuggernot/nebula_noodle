<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LOGS extends Model
{
    use HasFactory;
    protected $table = "LOGS";
    protected $primaryKey = 'ID';
    public $timestamps = false;
}
