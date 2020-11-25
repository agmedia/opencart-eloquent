<?php


namespace Agmedia\Models\Manufacturer;


use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    
    /**
     * @var bool
     */
    public $timestamps = false;
    
    /**
     * @var string
     */
    protected $table = 'manufacturer';
    
}