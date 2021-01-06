<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    public function hobbies()
    {
        return $this->belongsToMany('App\Hobby');
    }

    public function filteredHobbies()
    {
        return $this->belongsToMany('App\Hobby')
            ->wherePivot('tag_id', $this->id)
            ->orderBy('created_at', 'DESC');
    }

    protected $fillable = [
        'name', 'style',
    ];
}
