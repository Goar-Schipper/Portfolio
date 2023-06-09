<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public $timestamps=false;


    protected $fillable = [
        'title',
        'image',
        'description',
        'created_at',
    ];
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
