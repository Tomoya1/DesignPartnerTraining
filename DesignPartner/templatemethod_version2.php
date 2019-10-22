<?php

class BasicTraining
{
    private $training;

    public function __construct($mainTraining)
    {
        $this->training = $mainTraining;
    }

    private function exercise()
    {
        return "準備運動をします";
    }

    private function afterTraining()
    {
        return "プロテインを補給します";
    }

    public function doTraining()
    {
        echo $this->exercise()."\n";
        echo $this->training->mainTraining()."\n";
        echo $this->afterTraining()."\n";
    }
}

class ChestTraining
{
    public function mainTraining()
    {
        return "チェストプレスをする";
    }
}

class LegTraining
{
    public function mainTraining()
    {
        return "レッグプレスをする";
    }
}

class AbsTraining
{
    public function mainTraining()
    {
        return "腹筋をする";
    }
}

class TrainingFactory
{
    public static function create($menu)
    {
        switch ($menu) {
            case "胸":
                return new BasicTraining(new ChestTraining());
            case "足":
                return new BasicTraining(new LegTraining());
            case "腹":
                return new BasicTraining(new AbsTraining());
            default:
                throw new Exception("不適切なメニューです");
        }
    }
}

try {

    $training = TrainingFactory::create("胸");
    $training->doTraining();

    $training = TrainingFactory::create("足");
    $training->doTraining();

    $training = TrainingFactory::create("腹");
    $training->doTraining();

} catch (Exception $e) {
    echo $e->getMessage();
}
