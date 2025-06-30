<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $connection = 'mongodb'; // Use MongoDB connection
    protected $collection = 'students'; // Optional: Specify collection name
    protected $fillable = ['name', 'email', 'course'];
}
