<?php


namespace Agmedia\Models\Category;


use Illuminate\Database\Eloquent\Model;

class CategoryFilter extends Model
{
    
    /**
     * @var bool
     */
    public $timestamps = false;
    
    /**
     * @var string
     */
    protected $table = 'category_filter';
    
}