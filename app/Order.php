<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'address', 'total_sum'];

    public function products()
    {
        return $this->belongsToMany('App\Product', 'product_order')->withPivot('product_sum', 'quantity');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
