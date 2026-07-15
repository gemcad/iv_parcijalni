<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'studenti';

    protected $fillable = [
        'ime',
        'prezime',
        'status',
        'godiste',
        'prosjek',
        'stipendija',
    ];

    protected function casts(): array
    {
        return [
            'godiste' => 'integer',
            'prosjek' => 'decimal:2',
            'stipendija' => 'decimal:2',
        ];
    }
}
