<?php

class Banner
{
    private $string;

    public function __construct($string)
    {
        $this->string = $string;
    }

    public function strongMessage()
    {
        return  $this->string . "!!!!!!\n";
    }

    public function starMessage()
    {
        return "☆" . $this->string . "☆\n";
    }
}

class StringBanner extends Push
{
    private $banner;

    public function __construct($string)
    {
        $this->banner = new Banner($string);
    }

    public function strong()
    {
       return $this->banner->strongMessage();
    }

    public function star()
    {
        return $this->banner->starMessage();
    }
}

abstract class Push
{
    public abstract function strong();

    public abstract function star();
}

$adapter = new StringBanner("勉強するぞ〜");
print_r($adapter->strong());
print_r($adapter->star());





