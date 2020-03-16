<?php


namespace Agmedia\Models\Option;


use Illuminate\Database\Eloquent\Model;

class OptionValue extends Model
{
    
    /**
     * @var bool
     */
    public $timestamps = false;
    
    /**
     * @var string
     */
    protected $table = 'option_value';
    
    /**
     * @var string
     */
    protected $primaryKey = 'option_value_id';
    
    /**
     * @var array
     */
    protected $guarded = [
        'option_value_id'
    ];
}