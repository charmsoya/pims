<?php

namespace App\models;
use Illuminate\Database\Eloquent\Model;

class Article_translation extends Model
{
	protected $fillable = ['language', 'title', 'content'];
	public function records()
	{
		return $this->belongsTo(Article_record::class, 'article_id');
	}
}
