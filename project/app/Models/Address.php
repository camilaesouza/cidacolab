<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\Search;
use App\Traits\CacheKeys;

class Address extends Model
{
    use Search;
    use CacheKeys;

    protected $searchBy = [
        'street_avenue',
        'type',
        'district',
        'cep'
    ];

    protected $fillable = [
        'cep',
        'type',
        'number',
        'city_id',
        'state_id',
        'district',
        'complement',
        'street_avenue',

        'complaint_id',
        'freighter_id',
    ];

    protected $appends = ['complete_address'];

    protected static $logFillable = true;
    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        return 'O endereço foi ' . __('log.event.m.' . $eventName);
    }

    public function complaint()
    {
        return $this->belongsTo('App\Models\Complaint', 'complaint_id')->withDefault();
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function state()
    {
        return $this->belongsTo('App\Models\State');
    }

    public function getCompleteAddressAttribute()
    {
        $cacheKey = $this->cacheKeyUpgradeable('complete-address');

        return cache_manager($cacheKey, '1 week', function () {
            if ($this->city_id && $this->state_id) {
                $city = request_cache('city.' . $this->city_id, function () {
                    return $this->city;
                });

                $state = request_cache('state.' . $this->state_id, function () {
                    return $this->state;
                });

                $city = $city->name;
                $state = $state->abbr;

                return $this->street_avenue . ', '
                    . $this->number . ' '
                    . $this->complement . ', '
                    . $this->district . ', '
                    . $this->cep . ' '
                    . $city . ' - '
                    . $state;
            }
        });
    }

    public function getCityStateAttribute()
    {
        $cacheKey = $this->cacheKeyUpgradeable('city-state');

        return cache_manager($cacheKey, '1 week', function () {
            if ($this->city_id && $this->state_id) {
                $city = $this->city->name;
                $state = $this->state->abbr;

                return $city . ' - ' . $state;
            }
        });
    }
}
