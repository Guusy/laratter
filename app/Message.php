<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
   	protected $guarded=[];
   	public function user(){
   		return $this->belongsTo(User::class);
	   }
	   
	// funcion super magia cuando se accede a la propiedad image   
	public function getImageAttribute($image)
	{
		if(!$image || starts_with($image,'http'))
		{
			return $image;
		}	
		
		return \Storage::disk('public')->url($image);
	}   
}
