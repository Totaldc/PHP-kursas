<?php

class Sniper
{
    private string $name;
    public int $accuracy = 50;
    public int $visibility = 10;
    public int $health = 100;
    public int $damage = 100;


    public function __construct(string $name)
    {
        $this->name = $name;
    }


    public function spotted(): bool
    {
        return $this->visibility > rand(1, 100);
    }

    public function attack()
    {
        return  $this->accuracy > rand(1, 100) ? $this->damage : 0;
    }


    public function hit($damage): int
    {
        if ($damage) {
            return $this->health -= $damage;
        } else {
            return 100;
        }
    }

    public function isAlive(): bool
    {
        return $this->health > 0;
    }

  
    
}
