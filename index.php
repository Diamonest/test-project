<?php

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
print_r("\n");
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

interface ITracks{
    public function play_random_track();
}

class MusicAlbum implements ITracks{
    public string $title;
    public string $artist;
    public int $release_year;
    public string $genre;
    public array $tracklist;

    public function __construct($title, $artist, $release_year, $genre, $tracklist)
    {
        $this->title = $title;
        $this->artist = $artist;
        $this->release_year = $release_year;
        $this->genre = $genre;
        $this->tracklist = $tracklist;
    }

    private function play_track($track_number){
        print_r("Воспроизводится трек ".$track_number.": ".$this->tracklist[$track_number-1]);
    }

    public function play_random_track()
    {
        $track_number = rand(1, count($this->tracklist));
        $this->play_track($track_number);
    }

}

$album4 = new MusicAlbum("Deutschland", "Rammstein", 2019, "Neue Deutsche Härte", 
                    ["Deutschland", "Radio", "Zeig dich", "Ausländer", "Sex", 
                     "Puppe", "Was ich liebe", "Diamant", "Weit weg", "Tattoo", 
                     "Hallomann"]);
print_r("Название:". $album4->title."\n");
print_r("Исполнитель:". $album4->artist."\n");
print_r("Год:". $album4->release_year."\n");
print_r("Жанр:". $album4->genre."\n");
print_r("Треки:". implode(",",$album4->tracklist)."\n");
$album4->play_random_track();

print_r("hello world!");