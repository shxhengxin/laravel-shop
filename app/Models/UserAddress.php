<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    protected $fillable = [
        'province',
        'city',
        'district',
        'address',
        'zip',
        'contact_name',
        'contact_phone',
        'last_used_at',
    ];
    protected $dates = ['last_used_at'];

    protected $appends = ['full_address'];

    /**
     * @desc 地址---用户
     * @Author shenhengxin
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFullAddressAttribute() {
        return "{$this->province}{$this->city}{$this->district}{$this->address}";
    }

    /**
     * @return array
     */
    public function getDates() {
        return $this->dates;
    }

    /**
     * @return array
     */
    public function getFillable() {
        return $this->fillable;
    }

    /**
     * @param array $dates
     */
    public function setDates($dates) {
        $this->dates = $dates;
    }

    /**
     * @param array $fillable
     */
    public function setFillable($fillable) {
        $this->fillable = $fillable;
    }

    
}
