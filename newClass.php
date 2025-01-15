<?php

interface School{
    public function average_score();
}

class Student{
    public string $name;
    public int $age;
    public string $grade;
    public array $scores;

    public function __construct($name, $age, $grade, $scores){
        $this->name = $name;
        $this->age = $age;
        $this->grade = $grade;
        $this->scores = $scores;
    }

    public function average_score(){
        return array_sum($this->scores)/count($this->scores);
    }
}

$student2 = new Student("Егор Данилов", 12, "5B", [5, 4, 4, 5]);
print("Имя:". $student2->name."\n");
print("Возраст:". $student2->age."\n");
print("Класс:". $student2->grade."\n");
print("Оценки:". implode(", ",$student2->scores)."\n");
print("Средний балл:". $student2->average_score());