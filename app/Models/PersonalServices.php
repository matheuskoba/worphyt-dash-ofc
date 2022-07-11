<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalServices extends Model
{
    use HasFactory;
    protected $table = 'personalservices';
    public $timestamps = false;
}
