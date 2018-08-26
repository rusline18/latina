<?php

namespace Latina;

use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    protected $table = 'direction';
    protected $dateFormat = 'U';
    protected $fillable = ['name'];
}
