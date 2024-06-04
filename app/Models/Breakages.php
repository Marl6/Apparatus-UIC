<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breakages extends Model
{

    use HasFactory;

    protected $table ="breakages";
    protected $primaryKey = "id";
    public $timestamps = false; // Adjust according to your needs


    protected $fillable = [
        'group_no',
        'group_leader',
        'requisition_id',
        'quantity',
        'amount',
        'datetime_paid',
        'datetime_added',
        'datetime_update',
        'statuscode',
        'apparatus_name'
    ];
    

}
