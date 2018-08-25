<?php

namespace Latina;

use Illuminate\Database\Eloquent\Model;

class Lid extends Model
{
    protected $table = 'lid';
    protected  $dateFormat = 'U';
    protected $fillable = ['name', 'phone', 'direction_id', 'type'];
}
