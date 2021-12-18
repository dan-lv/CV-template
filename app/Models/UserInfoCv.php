<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserInfoCv extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $table = 'user_info_cv';

    protected $fillable = [
        'user_id',
        'name',
        'avatar_url',
        'name',
        'avatar_url',
        'job',
        'gender',
        'birthday',
        'address',
        'phone',
        'email',
        'website',
        'career_goals',
        'education',
        'work_experience',
        'activities',
        'certifications',
        'skill',
        'hobit',
        'set_color_temp1',
        'set_color_temp2',
    ];
}
