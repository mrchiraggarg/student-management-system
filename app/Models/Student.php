<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model; 

class Student extends Model
{
    protected $connection = 'mongodb'; // ✅ Force MongoDB
    protected $collection = 'students';
    protected $fillable = ['name', 'email', 'course'];
}
