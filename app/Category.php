<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $fillable = ['name','created_by','sort_order'];

    public function createdBy(){
        return $this->hasOne(User::class,'id','created_by');
    }
}
