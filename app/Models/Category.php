<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Get the images associated with the category.
     */
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
