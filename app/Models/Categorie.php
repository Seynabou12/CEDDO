<?php

namespace App\Models;

use App\Models\Trait\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory, HasUuid;
    protected $guarded = ['id'];

    public function livres()
    {
        return $this->hasMany(Livre::class);
    }
    
}
