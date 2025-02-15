<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\Category;



class View extends Model
{
  
    use HasFactory;
    protected $fillable = ['user_id', 'category_id'];

    public function user () : BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function category () : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
