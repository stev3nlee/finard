<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use SoftDeletes;
    public $timestamps = true;
    protected $table = 'appointment';
    protected $fillable = ['type', 'date', 'time', 'name', 'email', 'phone', 'grooms_ring_size', 'brides_ring_size', 'diamond_shapes', 'with_guest', 'guest_name', 'guest_email', 'carat_weight', 'style', 'budget', 'achieve', 'data_correct', 'status'];
    protected $attributes = [
        'status' => 1,
    ];

}
