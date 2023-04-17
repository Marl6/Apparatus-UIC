<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breakages extends Model
{

    use HasFactory;

    protected $table ="breakages";
    protected $primaryKey = "id";

    protected $fillable = [
        'group_no',
        'requisition_id',
        'quantity',
        'amount',
        'datetime_added',
        'datetime_update',
        'statuscode'


    ];


}
