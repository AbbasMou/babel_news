<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    use HasFactory;

    // Define the table associated with the model.
    protected $table = 'news_categories';

    protected $fillable = ['name', 'click_count'];

    // Disable automatic timestamp columns (created_at and updated_at).
    public $timestamps = false;

    public function clicks()
    {
        return $this->hasMany(Click::class);
    }
}
