<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['bio', 'location', 'phone']; // Sesuaikan dengan kolom di tabel profiles

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
