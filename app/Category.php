<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\Viewable;
use CyrildeWit\EloquentViewable\Contracts\Viewable as ViewableContract;

class Category extends Model implements ViewableContract
{
    use Viewable;

    // ...
    public function item()
    {

        return $this->hasMany('App\Item');
    }
}

