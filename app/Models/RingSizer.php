<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ring_sizer extends Model
{    
    public $timestamps = true;
    protected $table = 'ring_sizer';
    protected $fillable = ['content', 'image'];
}
