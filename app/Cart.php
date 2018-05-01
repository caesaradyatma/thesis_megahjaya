<?php
namespace App;

class Cart
{
  public $items = null;
  public $totQty = 0;
  public $totPrice = 0;

  public function __construct($oldCart)
  {
    if($oldCart)  {
      $this->items = $oldCart->items;
      $this->totQty = $oldCart->totQty;
      $this->totPrice = $oldCart->totPrice;
    }
  }

  public function add($item, $id)
  {
    $storedItem = ['id'=>$id,'item_quantity' => 0, 'item_price' => $item->item_price, 'item' => $item ];
    if($this->items){
      if(array_key_exists($id, $this->items)){
        $storedItem = $this->items[$id];
      }
    }
    $storedItem['item_quantity']++;
    $storedItem['item_price'] = $item->item_price * $storedItem['item_quantity'];
    // $this->items[$id];
    $this->totQty ++;
    $this->totPrice += $item->item_price;
    $this->items[$id] = $storedItem;
  }
}
