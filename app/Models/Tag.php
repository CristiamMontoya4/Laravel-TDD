<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [ //Asignación masiva, este modelo va a esperar de forma masiva al campo name
        'name' ,
        'slug' ,   
    ];

    public function getSlugAttribute()
    {
       return strtolower(
        str_replace(' ', '-', $this->name)
       ); 
    }
}
