<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;
    protected $table = "categories_pec4";

    public function recipes(): BelongsToMany{
        return $this->belongsToMany(Recipe::class);
    }
}
