<?php

namespace App\Pixels;

use \Core\FileDB;
use App\App;

class Pixel
{
    private $data;
    public static FileDB $db;

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

    public function _setData(array $data)
    {
        $this->setX($data['coordinate_x']);
        $this->setY($data['coordinate_y']);
        $this->setColor($data['color']);
        $this->setEmail($data['email']);
    }

    public function _getData()
    {
        $arrData['x'] = $this->getX();
        $arrData['y'] = $this->getY();
        $arrData['color'] = $this->getColor();
        $arrData['email'] = $this->getEmail();

        return $arrData;
    }
}
