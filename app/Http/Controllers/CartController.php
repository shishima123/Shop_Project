<?php
namespace App;

class Cart
{
    public $items = null;
    public $totaLQty = 0;
    public $totaLPrice = 0;
    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totaLQty = $oldCart->totaLQty;
            $this->totaLPrice = $oldCart->totaLPrice;
        }
    }
    public function add($item, $id)
    {
        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++;
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totaLQty++;
        $this->totaLPrice += $item->price;
    }
}