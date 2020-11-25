<?php


namespace Agmedia\Models;


use Illuminate\Database\Eloquent\Model;

class SeoUrl extends Model
{
    
    /**
     * @var bool
     */
    public $timestamps = false;
    
    /**
     * @var string
     */
    protected $table = 'seo_url';
    
}