<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Color extends Model
{
    use SoftDeletes;
    public $timestamps = true;
    protected $table = 'color';
    protected $fillable = ['name', 'color'];
    protected $attributes = [
        'status' => 1,
    ];
}
