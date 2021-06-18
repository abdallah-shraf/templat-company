<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emplyee extends Model
{
    protected $table= "emplyees";
    protected $fillable=['name', 'salary', 'Image'];
}
