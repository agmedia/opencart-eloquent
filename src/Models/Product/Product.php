<?php


namespace Agmedia\Models\Product;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Product extends Model
{
    
    /**
     * @var bool
     */
    public $timestamps = false;
    
    /**
     * @var string
     */
    protected $table = 'product';
    
    /**
     * @var string
     */
    protected $primaryKey = 'product_id';
    
    /**
     * @var array
     */
    protected $guarded = [
        'product_id'
    ];
    
    /**
     * Relations methods
     */
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function options()
    {
        return $this->hasMany(ProductOption::class, 'product_id', 'product_id')->with('value');
    }
    
    /**
     * Query scope methods
     */
    
    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeSkus($query)
    {
        return ProductOption::where('product_id', $this->product_id)->pluck('sku');
    }
    
}