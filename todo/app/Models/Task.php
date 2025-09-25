<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // protected $table = "myTable";
    // protected $primaryKey= "id_task";
    // protected $timestamps = false;


    protected $fillable = [
        'title',
        'description',
        'completed',
        'due_date',
        'user_id'
    ];
}
