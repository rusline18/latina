<?php

namespace Latina;

use Illuminate\Database\Eloquent\Model;

/**
 * Модель заявок с лендинга
 * Class Lid
 * @package Latina
 */
class Lid extends Model
{
    protected $table = 'lid';
    protected  $dateFormat = 'U';
    protected $fillable = ['name', 'phone', 'direction_id', 'type'];

    public function direction()
    {
        return $this->hasOne('Latina\Direction');
    }
}
