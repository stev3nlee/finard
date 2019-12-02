<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{
    use HasSlug;
    use SoftDeletes;
    public $timestamps = true;
    protected $table = 'product';
    protected $fillable = ['name','slug','image','price','description','status','gold'];
    protected $attributes = [
        'status' => 1,
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
            //->doNotGenerateSlugsOnUpdate();
    }

    public function product_image()
    {
        return $this->hasMany('App\Models\Product_image');
    }

    public function category()
    {
        return $this->belongsToMany('App\Models\Category', 'product_category', 'product_id', 'category_id');
    }

    public function sub_category()
    {
        return $this->belongsToMany('App\Models\Sub_category', 'product_sub_category', 'product_id', 'sub_category_id');
    }

}
