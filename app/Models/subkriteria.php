<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subkriteria extends Model
{
    protected $fillable = [
        'idkriteria',
        'subkriteria',
        'keterangan',
        'poin'
    ];
    use HasFactory;
}
