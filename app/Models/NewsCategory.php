<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    use HasFactory;
    protected $table = 'news_categories';
    protected $fillable = ['name', 'click_count'];
    public $timestamps = false;

    public function clicks()
    {
        return $this->hasMany(Click::class);
    }
}
