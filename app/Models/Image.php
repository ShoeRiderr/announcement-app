<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'storage',
        'name',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\
     */
    public function announcements()
    {
        return $this->morphedByMany(Announcement::class, 'imageable');
    }
}
