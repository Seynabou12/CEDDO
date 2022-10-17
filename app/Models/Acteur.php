<?php

namespace App\Models;

use App\Models\Trait\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acteur extends Model
{
    use HasFactory, HasUuid;
    protected $guarded = ['id'];
}
