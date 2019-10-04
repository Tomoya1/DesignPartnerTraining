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
}

class OutputterFactory
{
    public static function create($name)
    {
        switch ($name) {
            case 'tag':
                $tagOutputter = new TagOutputter("テスト");
                return $tagOutputter;
            case 'json':
                $jsonOuteputter = new JsonOutputter("筋トレ");
                return $jsonOuteputter;
            case 'count':
                $countOutputter = new CountOutputter("チェストプレス");
                return $countOutputter;
            default:
                throw new Exception("適切なnameではありません");
        }

    }
}

function process($outputter)
{
    echo $outputter->beforeDisplay() ."\n";
    echo $outputter->display()."\n";
    echo $outputter->afterDisplay()."\n";
}

$output = OutputterFactory::create('tag');

process($output);
