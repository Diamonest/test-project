<?php

require_once "interface.php";

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

class BankAccount implements IBankAccount{
    private int $balance;
    private float $interest_rate;
    private array $transactions = [];
    public function __construct($balance, $interest_rate)
    {
        $this->balance = $balance;
        $this->interest_rate = $interest_rate;
    }
    public function deposit($amount){
        $this->balance += $amount;
        $this->transactions[] = "Внесение наличных на сумму $amount"; 
    }
    public function withdraw($amount){
        if ($this->balance < $amount){
            print_r("Недостаточно средств");
        }
        $this->balance -= $amount;
        $this->transactions[] = "Снятие наличных на сумму $amount";
    }
    public function add_interest(){
        $interest = $this->balance * $this->interest_rate;
        $this->balance += $interest;
        $this->transactions[] = "Начислины проценты по вкладу $interest";
    }
    public function history(){
        for ($i = 0; $i < count($this->transactions); $i++){
            print_r($this->transactions[$i]."\n");
        }
    }
}

class Publisher{
    private string $name;
    private string $location;
    public function __construct($name, $location){
        $this->name = $name;
        $this->location = $location;
    }
    private function get_info(){
        return "$this->name ($this->location)";
    }
    public function publish($message){
        print_r("Готовим $message к публикации в ".$this->get_info());
    }
}

class Employee{
    private string $name;
    private int $age;
    private int $salary;
    private float $bonus;
    public function __construct($name, $age, $salary)
    {
        $this->name = $name;
        $this->age = $age;
        $this->salary = $salary;
        $this->bonus = 0;
    }
    public function set_bonus($bonus){
        $this->bonus = $bonus;
    }
    public function get_name(){
        return $this->name;
    }
    public function get_age(){
        return $this->age;
    }
    public function get_salary(){
        return $this->salary;
    }
    public function get_bonus(){
        return $this->bonus;
    }
    public function get_total_salary(){
        return $this->salary + $this->bonus;
    }
}
class Candy{
    public $name;
    public $price;
    public $weight;
    public function __construct($name, $price, $weight)
    {
        $this->name = $name;
        $this->price = $price;
        $this->weight = $weight;
    }
}
class Chocolate extends Candy{
    public $cocoa_percentage;
    public $chocolate_type;
    public function __construct($name,$price,$weight,$cocoa_percentage,$chocolate_type)
    {
        $this->name = $name;
        $this->price = $price;
        $this->weight = $weight;
        $this->cocoa_percentage = $cocoa_percentage;
        $this->chocolate_type = $chocolate_type;
    }
}
class Gummy extends Candy{
    public $flavor;
    public $shape;
    public function __construct($name,$price,$weight,$flavor,$shape)
    {
        $this->name = $name;
        $this->price = $price;
        $this->weight = $weight;
        $this->flavor = $flavor;
        $this->shape = $shape;
    }
}
class HardCandy extends Candy{
    public $flavor;
    public $filled;
    public function __construct($name,$price,$weight,$flavor,$filled)
    {
        $this->name = $name;
        $this->price = $price;
        $this->weight = $weight;
        $this->flavor = $flavor;
        $this->filled = $filled;
    }
}

$student2 = new Student("Егор Данилов", 12, "5B", [5, 4, 4, 5]);
print("Имя:". $student2->name."\n");
print("Возраст:". $student2->age."\n");
print("Класс:". $student2->grade."\n");
print("Оценки:". implode(", ",$student2->scores)."\n");
print("Средний балл:". $student2->average_score());

$account = new BankAccount(100000, 0.05);
$account->deposit(15000);
$account->withdraw(7500);
$account->add_interest();
$account->history();
print_r("\n");

print_r("Hello my-release2");

$publisher = new Publisher("АБВГД Пресс", "Москва");
$publisher->publish("Справочник писателя");

print_r("Hello my-release");
print_r("Слияние дубль 2 Ветка: my-releases1");
print_r("Слияние дубль 2 Ветка: my-release");

$employee = new Employee("Марина Арефьева", 30, 90000);
$employee->set_bonus(15000);
print_r("Имя:", $employee->get_name());
print_r("Возраст:", $employee->get_age());
print_r("Зарплата:", $employee->get_salary());
print_r("Бонус:", $employee->get_bonus());
print_r("Итого начислено:", $employee->get_total_salary());
print("Solve conflict git rebase 2");
print_r("Solve another conflict");
print_r("solve confilcts many many many many many many");
print_r("resolve conflict with git rebase");

$chocolate = new Chocolate("Швейцарские луга", 325.50, 220, 40, "молочный");
$gummy = new Gummy("Жуй-жуй", 76.50, 50, "вишня", "медведь");
$hard_candy = new HardCandy("Crazy Фрукт", 35.50, 25, "манго",True);

print_r("Шоколадные конфеты:");
print_r("Название конфет: {$chocolate->name}");
print_r("Стоимость: {$chocolate->price} руб");
print_r("Вес брутто: {$chocolate->weight} г");
print_r("Процент содержания какао: {$chocolate->cocoa_percentage}");
print_r("Тип шоколада: {$chocolate->chocolate_type}");
print_r("\nМармелад жевательный:");
print_r("Название конфет: {$gummy->name}");
print_r("Стоимость: {$gummy->price} руб");
print_r("Вес брутто: {$gummy->weight} г");
print_r("Вкус: {$gummy->flavor}");
print_r("Форма: {$gummy->shape}");
print_r("\nФруктовые леденцы:");
print_r("Название конфет: {$hard_candy->name}");
print_r("Стоимость: {$hard_candy->price} руб");
print_r("Вес брутто: {$hard_candy->weight} г");
print_r("Вкус: {$hard_candy->flavor}");
print_r("Начинка: {$hard_candy->filled}");