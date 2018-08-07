<?php

namespace App\models;
use Illuminate\Database\Eloquent\Model;

class Article_record extends Model
{
	//
    public function translation()
    {
        return $this->hasMany(Article_translation::class, 'article_id');
    }
}
