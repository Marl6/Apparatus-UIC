<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $table ="teacher";
    protected $primaryKey ="id";

    protected $fillable = [
        'first_name' ,
        'last_name' ,
        'email',
        'age',
        'phone_number'
    ];

}
