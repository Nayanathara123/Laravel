<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Student extends Model
{
    public $timestamps = false;
    protected $table = 'student';
    protected $primaryKey = 'id';
}
