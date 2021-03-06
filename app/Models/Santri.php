<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Santri extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $guard = 'santri';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'place_born',
        'birthday',
        'gender',
        'id_number',
        'blood',
        'phone_number',
        'email',
        'address',
        'RT',
        'RW',
        'village',
        'districs',
        'regency',
        'province',
        'father_name',
        'place_born_father', 
        'birthday_father',
        'mother_name',
        'place_born_mother', 
        'birthday_mother', 
        'parent_address', 
        'phone_number_parent', 
        'status',
        'photo',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
