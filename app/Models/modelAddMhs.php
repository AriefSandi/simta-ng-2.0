<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modelAddMhs extends Model
{
    use HasFactory;

    protected $table = 'mhs';
    protected $primaryKey = 'id_mhs';
    protected $fillable = ['', 'nim', 'nama', 'status', 'file','','','detail'];
}
