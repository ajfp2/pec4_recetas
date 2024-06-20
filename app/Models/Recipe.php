<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Recipe extends Model
{
    use HasFactory;

    protected $table = "recipes_pec4";

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function categories(): BelongsToMany{
        return $this->belongsToMany(Category::class);
    }



    

}
