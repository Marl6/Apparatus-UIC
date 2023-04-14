<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chemicals extends Model
{
    use HasFactory;

    protected $table ="chemicals";
    protected $primaryKey = "id";

    protected $fillable = [
        'date_requested',
        'date_to_be_used',
        'chemical_name',
        'quantity',
        'requested_by',
        'prepared_by'
    ];

    
}
