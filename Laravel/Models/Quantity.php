<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quantity extends Model
{
    protected $table = 'quantities';
    protected $fillable = ['product_id', 'stock_count'];

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
}
