<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class add_coin extends Model
{
    use HasFactory;
     protected $fillable = [
        'name',
        'sym', 
        'des',
        'checkbox',
        'telegram',
        'web',
        'address_name', 
        'address',
        'other',
        'e_c_address',
        'logo_link', 
        'act_price', 
        'mark_cap', 
        'launch_date',
        'created_by',
        'sol_address','facebook','twi','rec','youtube','insta','chart',
        
    ];
    public function coin_coment(){
        return $this->hasMany('App\Models\comment','coin_id','id');

    }
}
