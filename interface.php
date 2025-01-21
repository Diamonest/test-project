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
interface IPublisher{
    public function publish($message);
}
interface IRecipe{
    public function cook();
}
interface IBankAccount{
    public function deposit();
    public function withdraw();
    public function add_interest();
    public function history();
}
