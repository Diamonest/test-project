<?php

interface IShape{
    public function getArea();
}
interface IMusicAlbum{
    public function play_track($track_number);
}
interface IEmployee{
    public function get_total_salary();
}
interface IRecipe{
    public function cook();
}
interface IBankAccount{
    public function deposit($amount);
    public function withdraw($amount);
    public function add_interest();
    public function history();
}
interface IPublisher{
    public function publish($message);
}
interface VeganEat{
    public function get_name();
    public function get_quantity();
}
interface IArmy{
    public function move();
    public function attack();
    public function defend();
}
interface IDinosaur{
    public function get_personal_name();
    public function get_breed();
    public function get_height();
    public function get_weight();
}
interface IMovie{
    public function play();
}