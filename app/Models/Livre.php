<?php

namespace App\Models;

use App\Models\Trait\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    use HasFactory, HasUuid;
    protected $guarded = ['id'];

    public function acteurs()
    {
        return $this->belongsToMany(Acteur::class, 'livre_acteurs');
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
