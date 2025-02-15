<?php

namespace App\Models;
use App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoryType extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function categories () : HasMany
    {
        return $this->hasMany(Category::class);
    }
}
