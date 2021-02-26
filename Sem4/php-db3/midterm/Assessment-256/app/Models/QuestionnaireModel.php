<?php
namespace App\Models;

class QuestionnaireModel
{
    //All data from the form
    private $food;
    private $color;
    private $movie;
    private $book;
    
    //Simple constructor
    public function __construct($f, $c, $m, $b)
    {
        $this->food = $f;
        $this->color = $c;
        $this->movie = $m;
        $this->book = $b;
    }
    //simple print function to show all data
    public function print()
    {
        echo 'Food: ' . $this->food . ', Color: ' . $this->color . ' Movie: ' . $this->movie . ' Book: ' . $this->book;
    }
    //getters for each variable
    public function getFood()
    {
        return $this->food;
    }
    public function getColor()
    {
        return $this->color;
    }
    public function getMovie()
    {
        return $this->movie;
    }
    public function getBook()
    {
        return $this->book;
    }
}