<?php

class TagOutputter
{
    private $string;

    public function __construct($text)
    {
        $this->string = $text;
    }

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
        return "<p>" . $this->string . "</p>";
    }

    public function output()
    {
        echo $this->beforeDisplay() ."\n";
        echo $this->display()."\n";
        echo $this->afterDisplay()."\n";
    }
}

class JsonOutputter
{
    private $string;

    public function __construct($test)
    {
        $this->string = $test;
    }

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
        $arr = array('label' => $this->string);
        return json_encode($arr, JSON_UNESCAPED_UNICODE);
    }

    public function output()
    {
        echo $this->beforeDisplay() ."\n";
        echo $this->display()."\n";
        echo $this->afterDisplay()."\n";
    }
}

class CountOutputter
{
    private $string;

    public function __construct($text)
    {
        $this->string = $text;
    }

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
        return mb_strlen($this->string);
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
