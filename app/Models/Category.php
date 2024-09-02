<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Author;
use App\Models\CategoryType;
use App\Models\Comment;
class Category extends Model
{
    use HasFactory;
    protected $fillable = [ 'title', 'description', 'image', 'video', 'social_media_link', 'author_id', 'category_type_id' ];


    public function author () : BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function categoryType () : BelongsTo
    {
        return $this->belongsTo(CategoryType::class);
    }

    public function comments () : HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function views () : HasMany
    {
        return $this->hasMany(App\Models\View::class);
    }

}
