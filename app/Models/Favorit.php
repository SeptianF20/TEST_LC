<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorit extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'pencarian_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pencarian()
    {
        return $this->belongsTo(Pencarian::class);
    }
}
