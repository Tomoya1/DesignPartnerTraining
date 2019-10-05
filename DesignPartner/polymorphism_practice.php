<?php

class TagOutputter extends BasicOutputter
{
    public function beforeDisplay()
    {
        return "<html>". "\n" . "<body>";
    }

    public function afterDisplay()
    {
        return "</body>" . "\n" . "</html>";
    }

    public function display()
    {
        return "<p>" . $this->getString() . "</p>";
    }
}

class JsonOutputter extends BasicOutputter
{
    public function beforeDisplay()
    {
        return "{" . "\n" . "result:";
    }

    public function afterDisplay()
    {
        return "}";
    }

    public function display()
    {
        $arr = array('label' => $this->getString());
        return json_encode($arr, JSON_UNESCAPED_UNICODE);
    }
}

class CountOutputter extends BasicOutputter
{
    public function beforeDisplay()
    {
        return "チェストプレスの文字数は....";
    }

    public function afterDisplay()
    {
        return "!!!!";
    }

    public function display()
    {
        return mb_strlen($this->getString());
    }
}

class BasicOutputter
{
    private $string;

    public function __construct($text)
    {
        $this->string = $text;
    }

    public function getString()
    {
        return $this->string;
    }

    public function output()
    {
        echo $this->beforeDisplay() ."\n";
        echo $this->display()."\n";
        echo $this->afterDisplay()."\n";
    }
}

class OutputterFactory
{
    public static function create($name)
    {
        switch ($name) {
            case 'tag':
                return new TagOutputter("テスト");
            case 'json':
                return new JsonOutputter("筋トレ");
            case 'count':
                return new CountOutputter("チェストプレス");
            default:
                throw new Exception("適切なnameではありません");
        }
    }
}

function process($outputter) {
    $outputter->output();
}

$tagOutput = OutputterFactory::create('tag');
$jsonOutput = OutputterFactory::create('json');
$countOutput = OutputterFactory::create('count');

process($tagOutput);
process($jsonOutput);
process($countOutput);
