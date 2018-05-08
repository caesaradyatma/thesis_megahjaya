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

  public function add($item, $id, $order_qty)
  {
    $storedItem = ['id'=>$id,'order_quantity' => $order_qty, 'item_price' => $item->item_price, 'item' => $item ];
    if($this->items){
      if(array_key_exists($id, $this->items)){
        $storedItem = $this->items[$id];
        $storedItem['order_quantity'] = $storedItem['order_quantity'] + $order_qty;
      }
    }
    // $storedItem['order_quantity']++;

    $storedItem['item_price'] = $item->item_price * $storedItem['order_quantity'];
    // $this->items[$id];
    $this->totQty += $storedItem['order_quantity'];
    // $this->totPrice += $item->item_price;
    $this->totPrice += $storedItem['item_price'];
    $this->items[$id] = $storedItem;
  }

  public function modify($item, $id, $order_qty)
  {
    // $storedItem = ['id'=>$id,'order_quantity' => $order_qty, 'item_price' => $item->item_price, 'item' => $item ];
    if($this->items){
      if(array_key_exists($id, $this->items)){
        $storedItem = $this->items[$id];
        $this->totPrice -= $storedItem['item_price'];
        $this->totQty -= $storedItem['order_quantity'];
        $storedItem['order_quantity'] = $order_qty;
      }
      $storedItem['item_price'] = $item->item_price * $storedItem['order_quantity'];
      $this->totQty += $storedItem['order_quantity'];
      $this->totPrice += $storedItem['item_price'];
      $this->items[$id] = $storedItem;
    }
  }
}
