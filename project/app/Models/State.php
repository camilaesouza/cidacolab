<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
        'id',
        'name',
        'abbr',
    ];

    public function cities()
    {
        return $this->hasMany('App\Models\City', 'state_id', 'id');
    }

    public function getFormattedNameAttribute()
    {
        return $this->name .  ' - ' . $this->abbr;
    }
}
