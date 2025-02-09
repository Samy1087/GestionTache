<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class tache extends Model
{
    use HasFactory;
    protected $table = 'tache';
    protected $fillable = ['nom','action'];
}
