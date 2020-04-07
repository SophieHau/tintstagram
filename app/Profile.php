<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];
    
    public function profileImage()
    {
        $imagePath = ($this->image) ? $this->image : 'profile/hDBtSgBx1gVLUAIEfNppxWg6iNl784rDK44tsgsA.png';
        return '/storage/' . $imagePath;
        
    }

    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }
}
