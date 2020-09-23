<?php

class Pixel
{
    private $data;

    public function setX(int $x)
    {
        $this->data['coordinate_x'] = $x;
    }
    public function getX()
    {
        return $this->data['coordinate_x'] ?? null;
    }

    public function setY(int $y)
    {
        $this->data['coordinate_y'] = $y;
    }
    public function getY()
    {
        return $this->data['coordinate_y'] ?? null;
    }

    public function setColor(string $color)
    {
        $this->data['color'] = $color;
    }
    public function getColor()
    {
        return $this->data['color'] ?? null;
    }

    public function setEmail(string $email)
    {
        $this->data['email'] = $email;
    }
    public function getEmail()
    {
        return $this->data['email'] ?? null;
    }
}
