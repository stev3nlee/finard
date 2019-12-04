<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quotation extends Model
{
    use SoftDeletes;
    public $timestamps = true;
    protected $table = 'quotation';
    protected $fillable = ['name', 'email', 'status', 'phone', 'subject', 'message', 'ring_detail', 'setting', 'carat', 'budget', 'image'];
    protected $attributes = [
        'status' => 1,
    ];
}
