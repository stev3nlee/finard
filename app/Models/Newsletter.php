<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Newsletter extends Model
{
    public $timestamps = true;
    protected $table = 'newsletter';
    protected $fillable = ['email'];

}