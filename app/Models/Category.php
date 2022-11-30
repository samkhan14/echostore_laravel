<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // relation with section table
    public function relSection()
    {
        return $this->belongsTo(Section::class, 'section_id')->select('id','name');
    }

    // relation with Category table itself
    public function relParent()
    {
        return $this->belongsTo(Category::class, 'parent_id')->select('id','category_name');
    }

    // relation with sub Category with parent_id
    public function subcategories()
    {
        return $this->hasMany(Category::class, 'parent_id')->where('status',1);
    }



}
