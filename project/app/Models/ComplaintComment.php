<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComplaintComment extends Model
{
    protected $fillable = [
        'id',
        'comment',
        'complaint_id',
    ];

    public function complaint()
    {
        return $this->belongsTo('App\Models\Complaint', 'complaint_id');
    }
}
