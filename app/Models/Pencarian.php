<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pencarian extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'kata', 'makna'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
