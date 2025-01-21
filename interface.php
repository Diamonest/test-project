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
