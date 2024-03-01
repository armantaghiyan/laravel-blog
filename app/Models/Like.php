<?php

namespace App\Models;

use Arman\LaravelHelper\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory, BaseModel;

    //------------------------------------------------------------------------------------------------------------------
    //------------------------------------------------ RELATIONS -------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------

    public function target()
    {
        return $this->morphTo();
    }
}
