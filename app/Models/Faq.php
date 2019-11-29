<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Faq extends Model
{
    use SoftDeletes;
    public $timestamps = true;
    protected $table = 'faq';
    protected $fillable = ['question', 'answer', 'faq_category_id'];


    public function category()
    {
        return $this->belongsTo('App\Models\Faq_category','faq_category_id','id');
    }
}
