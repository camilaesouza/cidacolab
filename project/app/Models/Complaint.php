<?php

namespace App\Models;

use App\Scopes\Search as SearchScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Complaint extends Model implements HasMedia
{
    use HasFactory;
    use SearchScope;
    use HasMediaTrait;

    protected $searchBy = [
        'name',
    ];

    protected $fillable = [
        'name',
        'description',
        'is_solved',
        'longitude',
        'latitude',
        'requester_user_id'
    ];

    protected static $logAttributes = [
        'name',
    ];

    protected $casts = [
      'latitude' => 'double',
      'longitude' => 'double',
    ];

    public function address()
    {
        return $this->hasOne('App\Models\Address', 'complaint_id', 'id');
    }

    public function requesterUser()
    {
        return $this->hasOne('App\Models\User', 'id', 'requester_user_id');
    }
}
