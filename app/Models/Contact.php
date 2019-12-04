<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;
    public $timestamps = true;
    protected $table = 'contact';
    protected $fillable = ['name', 'email', 'status', 'phone', 'subject', 'message'];
    protected $attributes = [
        'status' => 1,
    ];
}
