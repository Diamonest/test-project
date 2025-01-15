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

class BankAccount{
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