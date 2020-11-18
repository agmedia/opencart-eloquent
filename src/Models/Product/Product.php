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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function descriptions()
    {
        return $this->hasMany(ProductDescription::class, 'product_id', 'product_id');
    }
    
    
    /**
     * @param $language_id
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function description($language_id)
    {
        return $this->hasOne(ProductDescription::class, 'product_id', 'product_id')->where('language_id', $language_id);
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
    
    /**
     * Custom methods
     */
    
    /**
     * @param $products - Should be array or integer.
     *
     * @return mixed
     */
    public function activate($products)
    {
        if (is_array($products)) {
            return $this->whereIn('product_id', $products)->update(['status' => 1]);
        }
        
        return $this->where('product_id', $products)->update(['status' => 1]);
    }
    
    
    /**
     * @param $products - Should be array or integer.
     *
     * @return mixed
     */
    public function deactivate($products)
    {
        if (is_array($products)) {
            return $this->whereIn('product_id', $products)->update(['status' => 0]);
        }
        
        return $this->where('product_id', $products)->update(['status' => 0]);
    }
    
}