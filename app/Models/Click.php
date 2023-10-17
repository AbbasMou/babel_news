<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Click extends Model
{
    use HasFactory;
    // Define the table associated with the model.
    protected $table = 'clicks';

    // Specify the columns that can be mass-assigned.
    protected $fillable = [
        'created_at', 'category_id',

    ];
    public $timestamps = true;
    const UPDATED_AT = null; // Disable the 'updated_at' column

    //     * Define a relationship with the Click model.

    // Define a relationship with the Category model.

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
