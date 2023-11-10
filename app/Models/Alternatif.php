<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    protected $fillable = [
        'namabibit',
        'detail'
    ];
    use HasFactory;
    public function get_alternatif(){
        return $this->latest()->paginate(5);
    }

    public function get_id($id){
        return $this->findOrFail($id);
    }
}
