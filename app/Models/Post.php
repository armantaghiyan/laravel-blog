<?php

namespace App\Models;

use App\Enums\LikeType;
use Arman\LaravelHelper\Models\BaseModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    use HasFactory, BaseModel;

    //------------------------------------------------------------------------------------------------------------------
    //------------------------------------------------ RELATIONS -------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function topic() {
        return $this->belongsTo(Topic::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function likes() {
        return $this->morphMany(Like::class, 'target');
    }

    //------------------------------------------------------------------------------------------------------------------
    //--------------------------------------------------  SCOPE --------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------

    public function scopeWithUser(Builder $query, array $cols = [COL_USER_ID]) {
        return $query->with('user', function ($q) use ($cols) {
            $q->select($cols);
        });
    }

    public function scopeWithLikes($query, $colum, $userId) {
        return $query->with(array('likes' => function ($query) use ($userId) {
            $query->where(TB_LIKES . '.' . COL_LIKE_USER_ID, $userId)->where(COL_LIKE_TARGET_TYPE, LikeType::POST);
        }));
    }

    //------------------------------------------------------------------------------------------------------------------
    //-----------------------------------------  Accessors and Mutators ------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------

    public function getThumbnailAttribute($value) {
        return $this->correctImage(PATH_POST_THUMBNAIL, $value);
    }
}
