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
class Vegetable implements VeganEat{
    protected $name;
    protected $quantity;
    public function __construct($name, $quantity)
    {
        $this->name = $name;
        $this->quantity = $quantity; 
    }
    public function get_name()
    {
        return $this->name;
    }
    public function get_quantity()
    {
        return "{$this->quantity} кг";
    }
}
class Fruit implements VeganEat{
    protected $name;
    protected $quantity;
    public function __construct($name, $quantity)
    {
        $this->name = $name;
        $this->quantity = $quantity;
    } 
    public function get_name(){
        return $this->name;
    }
    public function get_quantity()
    {
        return "{$this->quantity} кг";
    }
}

class Vegeterian{
    public function get_name(VeganEat $vegan){
        echo $vegan->get_name();
    }
    public function get_quantity(VeganEat $vegan){
        echo $vegan->get_quantity();
    }
}

class Infantry implements IArmy{
    public function move(){
        print_r("Пехота движется в пешем порядке");
    }
    public function attack(){
        print_r("Пехота учавствует в ближнем бою");
    }
    public function defend(){
        print_r("Пехота держит строй");
    }
}

class Cavalry implements IArmy{
    public function move(){
        print_r("Кавалерия движется верхом");
    }
    public function attack(){
        print_r("Кавалерия переходит в атаку");
    }
    public function defend(){
        print_r("Кавалерия защищает фланги");
    }
}

class Army{
    protected array $arr;
    public function __construct()
    {
        $this->arr = [];
    }
    public function add_soldier(IArmy $soldier){
        $this->arr[] = $soldier;
    }
    public function attack(){
        foreach($this->arr as $soldier){
            $soldier->move();
            echo "\n";
            $soldier->attack();
            echo "\n";
        }
    }
    public function defend(){
        foreach($this->arr as $soldier){
            $soldier->move();
            echo "\n";
            $soldier->defend();
            echo "\n";
        }
    }
}

class Carnivore implements IDinosaur{
    protected $personal_name;
    protected $breed;
    protected $height;
    protected $weight;
    public function __construct($personal_name, $breed, $height, $weight)
    {
        $this->personal_name = $personal_name;
        $this->breed = $breed;
        $this->height = $height;
        $this->weight = $weight;
    }
    public function get_personal_name()
    {
        return $this->personal_name;
    }
    public function get_breed()
    {
        return $this->breed;
    }
    public function get_height()
    {
        return $this->height;
    }
    public function get_weight()
    {
        return $this->weight;
    }
    public function get_diet(){
        return "Травоядный";
    }
}
class Herbivore extends Carnivore implements IDinosaur {
}

class DinosaurPark{
    protected array $dinosaurs;
    public function __construct()
    {
        $this->dinosaurs = [];
    }
    public function add_dinosaur(IDinosaur $dinosaur){
        $this->dinosaurs[] = $dinosaur;
    }
    public function list_dinosaurs(){
        $dinosaurData = [];
        foreach ($this->dinosaurs as $dinosaur) {
            $dinosaurData[] = [
                $dinosaur->get_personal_name(),
                $dinosaur->get_breed(),
                $dinosaur->get_weight(),
                $dinosaur->get_height(),
                $dinosaur->get_diet(),
            ];
        }
        return $dinosaurData;
    }
}

class Comedy implements IMovie{
    public $title;
    public $director;
    public function __construct($title, $director)
    {
        $this->title = $title;
        $this->director = $director;
    }
    public function play(){
        print_r("Собираемся смотреть комедию {$this->title}, режиссер {$this->director}");
    }
}
class Drama extends Comedy implements IMovie{
    public function play()
    {
        print_r("Собираемся смотреть драму {$this->title}, режиссер {$this->director}");
    }
}
class Horror extends Comedy implements IMovie{
    public function play()
    {
        print_r("Собираемся смотреть фильм ужасов {$this->title}, режиссер {$this->director}");
    }
}
class Action extends Comedy implements IMovie{
    public function play()
    {
        print_r("Собираемся смотреть боевик {$this->title}, режиссер {$this->director}");
    }
}
class Romance extends Comedy implements IMovie{
    public function play()
    {
        print_r("Собираемс смотреть милодраму {$this->title}, режиссер {$this->director}");
    }
}
class FilmCatalogue{
    protected array $movies;
    public function __construct()
    {
        $this->movies = [];
    }
    public function add_movie($movie){
        $this->movies[] = $movie;
    }
    public function play_all_movies(){
        foreach($this->movies as $movie){
            $movie->play();
        }
    }
    public function search_movies_by_genre(IMovie $genre){
        $result = [];
        foreach($this->movies as $movie){
            if ($movie instanceof($genre)){
                $result[] = $movie;
            }
        }
        return $result;
    }
    public function play_movies_by_genre(IMovie $genre){
        $movies = $this->search_movies_by_genre($genre);
        foreach($movies as $movie){
            echo $movie->title;
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
print_r("\n");

$carrot = new Vegetable("Морковь", 5);
$apple = new Fruit("Яблоки", 10);
$vegan = new Vegeterian();

print_r($carrot->get_name()."\t");
print_r($carrot->get_quantity()."\n");
print_r($apple->get_name()."\t");
print_r($apple->get_quantity()."\n");

$vegan->get_name($carrot);
echo "\t";
$vegan->get_quantity($carrot);
echo "\n";
$vegan->get_name($apple);
echo "\t";
$vegan->get_quantity($apple);
echo "\n";

$army = new Army();
$army->add_soldier(new Infantry());
$army->add_soldier(new Cavalry());
$army->add_soldier(new Infantry());
$army->add_soldier(new Cavalry());

$army->attack();
$army->defend();
$t_rex = new Carnivore('Тираннозавр', 'Рекс', 4800, 560);
$velociraptor = new Carnivore('Велоцираптор', 'Зубастик', 30, 70);
$stegosaurus = new Herbivore('Стегозавр', 'Стегга', 7100, 420);
$triceratops = new Herbivore('Трицератопс', 'Трипси', 8000, 290);

$park = new DinosaurPark();

$park->add_dinosaur($t_rex);
$park->add_dinosaur($velociraptor);
$park->add_dinosaur($stegosaurus);
$park->add_dinosaur($triceratops);

foreach($park->list_dinosaurs() as $dinosaur){

    print_r("Имя: {$dinosaur[0]}\nВид: {$dinosaur[1]}\nВес: {$dinosaur[2]} кг\nРост: {$dinosaur[3]} см\nРацион: {$dinosaur[4]}\n");
}

$my_catalogue = new FilmCatalogue();

$drama = new Drama("Крестный отец", "Френсис Ф. Коппола");
$codemy = new Comedy("Ночные игры", "Джон Фрэнсис Дейли, Джонатан М. Голдштейн");
$horror = new Horror("Дракула Брэма Стокера", "Френсис Ф. Коппола");
$action = new Action("Крушение", "Жан-Франсуа Рише");
$romance = new Romance("Честная куртизанка", "Маршалл Херсковиц");

$my_catalogue->add_movie($drama);
$my_catalogue->add_movie($codemy);
$my_catalogue->add_movie($horror);
$my_catalogue->add_movie($action);
$my_catalogue->add_movie($romance);

$my_catalogue->play_all_movies();

print_r("\nНайдены фильмы ужасов:");
foreach($my_catalogue->search_movies_by_genre($horror) as $movie){
    print_r($movie->title);
}

print("\nЗапускаем фильм из жанра 'Мелодрамы':");
$my_catalogue->play_movies_by_genre($romance);
