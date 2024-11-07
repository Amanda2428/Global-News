<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['description', 'user_id', 'category_id'];

    public function user () : BelongsTo
    {  
        return $this->belongsTo(User::class);
    }

    public function category () : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
