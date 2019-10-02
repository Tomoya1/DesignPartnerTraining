<?php

class TagOutputter
{
    private $string;

    public function __construct($text)
    {
        $this->string = $text;
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

    public function display()
    {
        return mb_strlen($this->string);
    }
}

function process($outputter, $text)
{
    echo $text ."\n";
    echo $outputter->display()."\n";
    echo 'おしまい'."\n";
}

$tagOutputter = new TagOutputter("テスト");
$jsonOuteputter = new JsonOutputter("筋トレ");
$countOutputter = new CountOutputter("チェストプレス");

process($tagOutputter, "テスト");
process($jsonOuteputter, "筋トレ");
process($countOutputter, "チェストプレス");
