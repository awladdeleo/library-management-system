<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;


class User extends Authenticatable implements TranslatableContract
{
    use HasApiTokens, HasFactory, Notifiable, Translatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    public $translatedAttributes = ['name','phone'];
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @param Builder $builder
     * @return Builder
     */
    public function scopeActive(Builder $builder): Builder
    {
        return $builder->where('status', true);
    }


    public function getImageAttribute(): string
    {
        if($this->attributes['image']!=null && Storage::exists($this->attributes['image'])){
            return url('storage/' . $this->attributes['image']);
        }else{
            return url('storage/default.jpg');
        }
    }

    public function getHasImageAttribute(){
        if($this->attributes['image']!=null && Storage::exists($this->attributes['image'])){
            return $this->attributes['image'];
        }else{
            return false;
        }
    }

}
