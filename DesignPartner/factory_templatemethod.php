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

    public function training()
    {
        echo $this->exercise()."\n";
        echo $this->mainTraining()."\n";
        echo $this->afterTraining()."\n";
    }
}

class Chest extends BasicTraining
{
    public function mainTraining()
    {
        return "チェストプレスをする";
    }
}

class Leg extends BasicTraining
{
    public function mainTraining()
    {
        return "レッグプレスをする";
    }
}

class Abs extends BasicTraining
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
                return new Chest();
            case "足":
                return new Leg();
            case "腹":
                return new Abs();
            default:
                throw new Exception("不適切なメニューです");
        }
    }
}

try {

    $chestTraining = TrainingFactory::create("胸");
    $chestTraining->training();

    $legTraining = TrainingFactory::create("足");
    $legTraining->training();

    $absTraining = TrainingFactory::create("腹");
    $absTraining->training();

} catch (Exception $e) {
    echo $e->getMessage();
}
