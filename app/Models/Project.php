<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = ['slug', 'technologies', 'img'];
    
    // collegamento type
    public function type(){
        return $this->belongsTo(Type::class);
    }

    // collegamneto teconologies
    public function technologies(){
        return $this->belongsToMany(Technology::class);
    }
}
