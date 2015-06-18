<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model {

	

	protected $fillable = [
		'title',
		'body',
		'created_at',
        'user_id' //temp
	];

	public function scopePublished($query)
	{
		$query->where('created_at', '<=', Carbon::now());
	}

	public function setCreatedAtAttribute($date)
	{
		$this->attributes['created_at'] = Carbon::parse($date);
	}

	public function getCreatedAtAttribute($date)
	{
		return new Carbon($date);
	}

    public function user()
    {
        return $this->belongsTo('App\User'); //user_id
    }


    public function tags()
    {
    	return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    public function getTagListAttribute()
    {
    	return $this->tags->lists('id');
    }




}
