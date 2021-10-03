<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $fillable = [ 'name', 'description' ];

    /**
     * The attributes that should be mutated to dates.
     * scratchcode.io
     * @var array
     */

    protected $dates = [ 'deleted_at' ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
