<?php

namespace App\Models;


use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Support\Facades\Storage;

class Book extends Model implements TranslatableContract
{
    use HasFactory,Translatable;

    protected $guarded = ['id'];

    public $translatedAttributes = ['title','description','author','genre'];

    public function getThumbnailAttribute(): string
    {
        if($this->attributes['thumbnail']!=null && Storage::exists($this->attributes['thumbnail'])){
            return url('storage/' . $this->attributes['thumbnail']);
        }else{
            return url('storage/default.jpg');
        }
    }

    public function getHasThumbnailAttribute(){
        if($this->attributes['thumbnail']!=null && Storage::exists($this->attributes['thumbnail'])){
            return $this->attributes['thumbnail'];
        }else{
            return false;
        }
    }

    /**
     * @param Builder $builder
     * @param null $searchItem
     * @return Builder
     */
    public function scopeSearch(Builder $builder, $searchItem = null): Builder
    {
        return $builder->whereTranslationLike('title', '%'.$searchItem.'%',app()->getLocale())
            ->orWhereTranslationLike('author',  '%'.$searchItem.'%',app()->getLocale())
            ->orWhereTranslationLike('genre',  '%'.$searchItem.'%',app()->getLocale());
    }

}
