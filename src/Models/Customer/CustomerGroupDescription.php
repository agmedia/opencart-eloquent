<?php


namespace Agmedia\Models\Customer;


use Illuminate\Database\Eloquent\Model;

class CustomerGroupDescription extends Model
{
    
    /**
     * @var bool
     */
    public $timestamps = false;
    
    /**
     * @var string
     */
    protected $table = 'customer_group_description';
    
    /**
     * @var string
     */
    protected $primaryKey = 'customer_group_id';
    
    /**
     * @var array
     */
    protected $guarded = [
        'customer_group_id'
    ];
}