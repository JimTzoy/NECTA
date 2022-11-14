<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $table = "plans";

    protected $fillable = [
        'plan',
        'informacion',
        'precio',
        'created_at',
        'updated_at',
    ];
}
