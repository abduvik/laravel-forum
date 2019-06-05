<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @mixin \Eloquent
 */
class Thread extends Model
{
    public function path()
    {
        return '/treads' . $this->id;
    }
}
