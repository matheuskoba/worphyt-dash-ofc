<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalGym extends Model
{
    use HasFactory;
    protected $table = 'personalgym';
    public $timestamps = false;
}
