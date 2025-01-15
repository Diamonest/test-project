<?php

interface IRecipe{
    public function cook();
    public function print_ingredients();
}

interface ISchool{
    public function average_score();
}

interface IPublisher{
    public function publish($message);
}

class Student implements ISchool{
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

class Recipe implements IRecipe{
    private string $name;
    private array $ingredients;
    public function __construct($name, $ingredients)
    {
        $this->name = $name;
        $this->ingredients = $ingredients;
    } 
    public function print_ingredients()
    {
        print_r("Ингредиенты для ".$this->name.": ");
        for($i=0; $i<count($this->ingredients)-1;$i++){
            print("- ".$this->ingredients[$i]."\n");
        }
    }
    public function cook(){
        print_r("Сегодня мы готовим блюдо ".$this->name.".\nВыполняем инструкцию по приготовлению блюда ".$this->name."...\nБлюдо".$this->name."готово!");
    }
}

class Publisher implements IPublisher{
    private string $name;
    private string $location;
    public function __construct($name, $location)
    {
        $this->name = $name;
        $this->location = $location;
    }
    public function get_info(){
        return "$this->name ($this->location)";
    }
    public function publish($message)
    {
        print_r("Готовим \"$message\" к публикации в {$this->get_info()}");
    }
}

$student2 = new Student("Егор Данилов", 12, "5B", [5, 4, 4, 5]);
print("Имя:". $student2->name."\n");
print("Возраст:". $student2->age."\n");
print("Класс:". $student2->grade."\n");
print("Оценки:". implode(", ",$student2->scores)."\n");
print("Средний балл:". $student2->average_score());


$spaghetti = new Recipe("Спагетти болоньезе", ["Спагетти", "Фарш", "Томатный соус", "Лук", "Чеснок", "Соль"]);
$spaghetti->print_ingredients();
$spaghetti->cook();

$cake = new Recipe("Кекс", ["Мука", "Яйца", "Молоко", "Сахар", "Сливочное масло", "Соль", "Ванилин"]);
$cake->print_ingredients();
$cake->cook();

$publisher = new Publisher("АБВГД Пресс", "Москва");
$publisher->publish("Справочник писателя");