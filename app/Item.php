<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\Viewable;
use CyrildeWit\EloquentViewable\Contracts\Viewable as ViewableContract;

class Item extends Model implements ViewableContract
{
    use viewable;
    //
    protected $table = "items";
    protected $fillable =['item_name','item_price',
    'item_vendor', 'item_location', 'item_quantity'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

}
