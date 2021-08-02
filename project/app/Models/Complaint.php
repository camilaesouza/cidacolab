<?php

namespace App\Models;

use App\Scopes\Search as SearchScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;
    use SearchScope;

    protected $searchBy = [
        'name'
    ];

    protected $fillable = [
        'name',
        'description',
        'address',
        'longitude',
        'latitude',
    ];
}
