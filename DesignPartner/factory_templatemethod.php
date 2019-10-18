<?php

class BasicTraining
{

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
        echo $this->mainTraining()."\n";
        echo $this->afterTraining()."\n";
    }
}

class ChestTraining extends BasicTraining
{
    public function mainTraining()
    {
        return "チェストプレスをする";
    }
}

class LegTraining extends BasicTraining
{
    public function mainTraining()
    {
        return "レッグプレスをする";
    }
}

class AbsTraining extends BasicTraining
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
                return new ChestTraining();
            case "足":
                return new LegTraining();
            case "腹":
                return new AbsTraining();
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
