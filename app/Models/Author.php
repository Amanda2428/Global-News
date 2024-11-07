<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Author extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'bio',
        'profile',
        'email',
        'address'
    ];

    public function categories () : HasMany
    {
        return $this->hasMany(Category::class);
    }
}
