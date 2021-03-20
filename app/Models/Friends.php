<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friends extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'notlp', 'alamat'];

    public function groups()
    {
        return $this->belongsTo('App\Models\Groups');
    }
}
