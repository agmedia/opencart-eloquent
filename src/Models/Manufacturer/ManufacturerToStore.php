<?php


namespace Agmedia\Models\Manufacturer;


use Illuminate\Database\Eloquent\Model;

class ManufacturerToStore extends Model
{
    
    /**
     * @var bool
     */
    public $timestamps = false;
    
    /**
     * @var string
     */
    protected $table = 'manufacturer_to_store';
    
}