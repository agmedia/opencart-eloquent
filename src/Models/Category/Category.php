<?php


namespace Agmedia\Models\Category;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    /**
     * @var bool
     */
    public $timestamps = false;
    
    /**
     * @var string
     */
    protected $table = 'category';
    
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
    
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function descriptions()
    {
        return $this->hasMany(CategoryDescription::class, 'category_id', 'category_id');
    }
    
    
    /**
     * @param $language_id
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function description($language_id)
    {
        return $this->hasOne(CategoryDescription::class, 'category_id', 'category_id')->where('language_id', $language_id);
    }
    
    
    /**
     * @param $categories - Should be array or integer.
     *
     * @return mixed
     */
    public function activate($categories)
    {
        if (is_array($categories)) {
            return $this->whereIn('product_id', $categories)->update(['status' => 1]);
        }
        
        return $this->where('product_id', $categories)->update(['status' => 1]);
    }
    
    
    /**
     * @param $categories - Should be array or integer.
     *
     * @return mixed
     */
    public function deactivate($categories)
    {
        if (is_array($categories)) {
            return $this->whereIn('product_id', $categories)->update(['status' => 0]);
        }
        
        return $this->where('product_id', $categories)->update(['status' => 0]);
    }
}