<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Permite la asignación masiva de estos campos
    protected $fillable = [
        'title',
        'description',
        'is_completed',
    ];

    /**
     * Relación inversa con User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}