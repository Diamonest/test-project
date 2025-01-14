<?php

/*class User{
    protected $name;
    protected $surname;
    protected $patronymic;

    public function __construct($name, $surname, $patronymic){
        $this->name = $name;
        $this->surname = $surname;
        $this->patronymic = $patronymic;
    }
    
    public function __toString(){
        return $this->name.' '.$this->surname.' '.$this->patronymic;
    }
}

class Arr{
    protected $numbers = [];

    public function add($num){
        $this -> numbers[] = $num;
        return $this;
    }
    public function __toString(){
        return (string) array_sum($this->numbers);
    }
}

class User1
	{
		private $name;
		private $age;
		
		public function __construct($name, $age)
		{
			$this->name = $name;
			$this->age = $age;
		}
		
		public function __get($property)
		{
			return $this->$property;
		}
	}

class Date1{
    public $year;
    public $month;
    public $day;

    public function __construct($year, $month, $day){
        $this->year = $year;
        $this->month = $month;
        $this->day = $day;
    }

    public function __get($property){
        if ($property == "weekDay"){
            return $this->year.'-'.$this->month.'-'.$this->day;
        }
    }
}

class User3
	{
		private $name;
		private $age;
		
        public function __set($property, $value){
            $this->$property = $value;
        }

		public function __get($property){
            return $this->$property;
        }
	}

$class = new User("Антон","Червоный","Владимирович");
echo $class;
echo "<br>";
$arr = new Arr;
echo $arr->add(1)->add(2)->add(3);
echo "<br>";
$class1 = new User1("Anton", 23);
echo $class1->name;
echo $class1->age;
echo "<br>";
$date = new Date1("2024","12","21");
echo $date->weekDay;
echo "<br>";
$user3 = new User3;
$user3->age = 23;
$user3->name = "Антон";
echo $user3->age;
echo $user3->name;
echo "<br>";
echo "<hr>";*/

/*interface Bag{
    public function getFruit();
}

class RedBag implements Bag{
    public function getFruit()
    {
        return "Яблоко";
    }
}
class GreenBag implements Bag{
    public function getFruit()
    {
        return "Груша";
    }
}
class BlueBag implements Bag{
    public function getFruit()
    {
        return "Виноград";
    }
}
class Human{
    public function takeFruit(Bag $bag){
        $fruit = $bag->getFruit();
        print_r("Человек взял из сумки $fruit\n");
    }
}

$redBag = new RedBag();
$greenBag = new GreenBag();
$blueBag = new BlueBag();

$human = new Human();
$human->takeFruit($redBag);
$human->takeFruit($greenBag);
$human->takeFruit($blueBag);*/

interface IShape{
    public function getArea();
}
interface IShape2 extends IShape{
    public function getSize();
}

class Circle implements IShape{
    private $radius;
    public function __construct($radius)
    {
        $this->radius = $radius;
    }
    public function getArea()
    {
        return pi() * pow($this->radius, 2);
    }
}
class Rectangle implements IShape{
    private $length;
    private $width;
    public function __construct($length, $width)
    {
        $this->length = $length;
        $this->width = $width;
    }
    public function getArea()
    {
        return $this->length * $this->width;
    }
}
class Rectangle2 implements IShape2{
    private $length;
    private $width;
    public function __construct($length, $width)
    {
        $this->length = $length;
        $this->width = $width;
    }
    public function getArea()
    {
        return $this->length * $this->width;
    }
    public function getSize(){
        return $this->length;
    }
}
class Compile{
    public function calculateArea(IShape $shapes){

        $totalArea = 0;
        $totalArea += $shapes->getArea();
               
        return $totalArea;
    }
}
$rect = new Rectangle2(4,4);
$circle = new Circle(5); 
$comp = new Compile();
//echo $comp->calculateArea($circle);
print_r($comp->calculateArea($rect));
/*$shapes = [new Circle(5), new Rectangle(6,8)];

$compile = new Compile();
$totalArea = $compile->calculateArea($shapes);
echo $totalArea;*/

interface AnimalInterface{
    public function makeSound();
}
interface OwnerInterface extends AnimalInterface{
    public function giveCommand();
}





