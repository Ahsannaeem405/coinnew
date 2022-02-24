<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    public function user_name(){
        return $this->belongsto('App\Models\User','user_id','id');

    }
    protected $casts = [
    'created_at' => 'date:M d , h:i a', // Change your format
    'updated_at' => 'datetime:d/m/Y',
    ];
}
