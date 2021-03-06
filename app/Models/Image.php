<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'picture',
        'size',
        'category_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];

    /**
     * Get the user that owns the image.
     */
    /*
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    */

    /**
     * Get the category that owns the image.
     */
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}