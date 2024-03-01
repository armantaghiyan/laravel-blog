<?php

namespace App\Models;

use Arman\LaravelHelper\Models\BaseModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, BaseModel;

    //------------------------------------------------------------------------------------------------------------------
    //------------------------------------------------ RELATIONS -------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'target');
    }

    //------------------------------------------------------------------------------------------------------------------
    //--------------------------------------------------  SCOPE --------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------

    public function scopeWithUser(Builder $query, array $cols = [COL_USER_ID])
    {
        return $query->with('user', function ($q) use ($cols) {
            $q->select($cols);
        });
    }

    //------------------------------------------------------------------------------------------------------------------
    //-----------------------------------------  Accessors and Mutators ------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------

    public function getThumbnailAttribute($value)
    {
        return $this->correctImage(PATH_POST_THUMBNAIL, $value);
    }
}
