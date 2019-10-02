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

function process($outputter, $text)
{
    echo $text ."\n";
    echo $outputter->display()."\n";
    echo 'おしまい'."\n";
}

$tagOutputter = new TagOutputter("テスト");
$jsonOuteputter = new JsonOutputter("筋トレ");

process($tagOutputter, 'テスト');
process($jsonOuteputter, '筋トレ');
