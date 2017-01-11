<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Row extends Model
{
    protected $table = 'row';
    protected $fillable = ['row_number'];
}
