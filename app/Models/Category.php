<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['category', 'user_id'];
    protected $with = ['user'];


    /**
     * 
     */
    public function user(){
        return $this->belongsTo(User::class);
    }
}
