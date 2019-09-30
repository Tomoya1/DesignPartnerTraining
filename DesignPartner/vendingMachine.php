<?php

class Item
{
    private $productName;
    private $price;

    public function setProductName($productName)
    {
        $this->productName = $productName;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getProductName()
    {
       return $this->productName;
    }

    public function getPrice()
    {
        return $this->price;
    }
}

class VendingMachine
{
    private $items;

    public function addItem($item)
    {
        $this->items[] = $item;
    }

    public function getItem()
    {
        return $this->items;
    }

    public function buy($productName, $cash)
    {
        foreach ($this->items as $key => $item) {
            if ($item->getProductName() === $productName) {
                if ($item->getPrice() > $cash) {
                    throw new Exception("cashが価格を下回っています");
                }
                // 購入した商品は販売機から削除する
                unset($this->items[$key]);
                return $item;
            }
        }
        throw new Exception("在庫が0件です");
    }

    public function canBuy($productName)
    {
        // itemsにある物とproductNameを比較する
        foreach ($this->items as $item) {
            if ($item->getProductName() === $productName) {
                return true;
            };
        }
        return false;
    }
}

try {
    $vendingMachine = new VendingMachine();
    $item = new Item();
    $item->setProductName('コーラ');
    $item->setPrice(120);
    $vendingMachine->addItem($item);

    $item2 = new Item();
    $item2->setProductName('なっちゃん');
    $item2->setPrice(150);
    $vendingMachine->addItem($item2);

    // 商品の在庫確認
    $result = $vendingMachine->canBuy('コーラ');

    // 商品の購入
    $vendingMachine->buy('なっちゃん', 150);

    print_r($vendingMachine->getItem());

} catch (Exception $e) {
    echo $e->getMessage();
}