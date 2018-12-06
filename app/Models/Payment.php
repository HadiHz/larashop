<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = ['id'];

    const COMPLETE = 1;
    const INCOMPLETE = 2;

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function payment_status_format()
    {
        switch ($this->attributes['status']){
            case self::COMPLETE:
                return 'تکیمیل شده';
                break;
            case self::INCOMPLETE:
                return 'ناقص';
                break;
        }
    }
}
