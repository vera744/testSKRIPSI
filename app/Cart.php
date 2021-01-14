<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    protected $fillable = [
    'total_price', 'quantity', 'customerID'
    ];

    protected $table = 'carts';

    public function product()
    {
        return $this->belongsTo('App\Product', 'IDProduct', 'productID');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'customerID', 'id');
    }
    // public $items = null;
    // public $totalQty = 0;
    // // public $totalPrice =0;

    //  public function __construct($oldCart)
    //  {
    //    if ($oldCart){
    //          $this->totalQty = $oldCart->totalQty;
    // }
    // }

    // public function add($item, $id){
    //     $storedItem = ['qty'=>0, 'price'=> $item->productPrice, 'item'=>$item];
    //     if ($this->items){
    //         if(array_key_exists($id, $this->items)){
    //             $storedItem = $this->items[$id];
    //         }
    //     }
    //     $storedItem['qty']++;
    //     $storedItem['price'] = $item->productPrice * $storedItem['qty'];
    //     $this->items[$id]= $storedItem;
    //     $this->totalQty++;
    //     $this->totalPrice += $item->productPrice;


    // }

    // public function scropMightAlsoLike($query){
    //     return $query->inRandomOrder()->take(4);
    // }



}
