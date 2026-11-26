<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Media extends Model
{
    use HasFactory;
    protected $table = 'media';
    protected $fillable = [
        'title',
        'type',
        'score',
        'year',
        'creator',
        'total_count'
    ];
    protected $casts = [
        'score' => 'float',
        'year' => 'integer',
        'total_count' => 'integer'
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
