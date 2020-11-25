<?php


namespace Agmedia\Models\Category;


use Illuminate\Database\Eloquent\Model;

class CategoryToLayout extends Model
{
    
    /**
     * @var bool
     */
    public $timestamps = false;
    
    /**
     * @var string
     */
    protected $table = 'category_to_layout';
    
    /**
     * @var string
     */
    protected $primaryKey = 'category_id';
    
    /**
     * @var array
     */
    protected $guarded = [
        'category_id'
    ];
    
}