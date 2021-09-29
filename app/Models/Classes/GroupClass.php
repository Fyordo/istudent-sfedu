<?php

namespace App\Models\Classes;

class GroupClass
{
    public int $id;
    public int $groupNumber;
    public int $groupCourse;
    public int $headmanId;
    public DirectionClass $direction;

    public function __construct($arr){
        $this->id = $arr['id'];
        $this->groupNumber = $arr['groupNumber'];
        $this->groupCourse = $arr['groupCourse'];
        $this->headmanId = $arr['headmanId'] ?? -1;
        $this->direction = DirectionClass::findById($arr['directionId']);
    }

    public function hasHeadman() : bool
    {
        return $this->headmanId != -1;
    }
}
