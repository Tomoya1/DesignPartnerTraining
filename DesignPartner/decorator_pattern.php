<?php

abstract class Ramen
{
    protected $description = "ラーメンです";

    public function getDescription()
    {
        return $this->description;
    }

    public abstract function getCost();
}

class MisoRamen extends Ramen
{

    public function __construct()
    {
        $this->description = "味噌ラーメン";
    }

    public function getCost()
    {
        return 500;
    }
}

class SoySauceRamen extends Ramen
{

    public function __construct()
    {
        $this->description = "醤油ラーメン";
    }

    public function getCost()
    {
        return 600;
    }
}

class SaltRamen extends Ramen
{

    public function __construct()
    {
        $this->description = "塩ラーメン";
    }

    public function getCost()
    {
        return 700;
    }
}

abstract class toppingDecorator extends Ramen
{
    protected $ramen, $description, $cost;

    public function __construct($ramen)
    {
        $this->ramen = $ramen;
    }

    public function getDescription()
    {
        return $this->ramen->getDescription() . "、" . $this->description;
    }

    public function getCost()
    {
        return $this->ramen->getCost() + $this->cost;
    }
}

class roastedPork extends toppingDecorator
{
    protected $description = "チャーシュー";
    protected $cost = "200";

    public function __construct($ramen)
    {
        parent::__construct($ramen);
    }
}

class menma extends toppingDecorator
{
    protected $description = "メンマ";
    protected $cost = "70";

    public function __construct($ramen)
    {
        parent::__construct($ramen);
    }
}

class spareRamen extends toppingDecorator
{
    protected $description = "替え玉";
    protected $cost = "100";

    public function __construct($ramen)
    {
        parent::__construct($ramen);
    }
}

// 味噌ラーメン
$Ramen = new MisoRamen();
$Ramen = new roastedPork($Ramen);
$Ramen = new menma($Ramen);
$Ramen = new spareRamen($Ramen);
print_r($Ramen->getDescription(). "\n" . $Ramen->getCost(). "円\n");

// 塩ラーメン
$Ramen = new SaltRamen();
$Ramen = new menma($Ramen);
$Ramen = new roastedPork($Ramen);
print_r($Ramen->getDescription(). "\n" . $Ramen->getCost(). "円\n");

// 醤油ラーメン
$Ramen = new SoySauceRamen();
$Ramen = new spareRamen($Ramen);
$Ramen = new menma($Ramen);
print_r($Ramen->getDescription(). "\n" . $Ramen->getCost(). "円\n");