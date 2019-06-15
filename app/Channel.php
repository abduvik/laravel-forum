<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Channel
 * @package App
 * @property string $name
 * @property string $slug
 * @mixin \Eloquent
 */
class Channel extends Model
{

    public function threads()
    {
        return $this->hasMany(Thread::class);
    }

    /**
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getPath()
    {
        $slug = $this->slug;
        return "/threads/{$slug}";
    }
}
