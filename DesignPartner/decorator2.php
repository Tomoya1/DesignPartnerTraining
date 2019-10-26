<?php

interface TextInterface
{
    public function showText();
}

class PushText implements TextInterface
{
    private $text;

    public function __construct($text)
    {
        $this->text = $text;
    }

    public function showText()
    {
        echo $this->text;
    }
}

abstract class TextDecorator implements TextInterface
{
    public abstract function showText();
}

class Quotation extends TextDecorator
{
    private $instance;

    public function __construct($instance)
    {
        $this->instance = $instance;
    }

    public function showText()
    {
        echo "\"";
        echo $this->instance->showText();
        echo "\"";
    }
}

class Banner extends TextDecorator
{
    private $instance;

    public function __construct($instance)
    {
        $this->instance = $instance;
    }

    public function showText()
    {
        echo "{ value : ";
        echo $this->instance->showText();
        echo " }";
    }
}

$text = new PushText("Decoratorパターン");
$text = new Quotation($text);
$text = new Banner($text);
print_r($text->showText());