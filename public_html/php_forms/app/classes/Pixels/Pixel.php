<?php

namespace App\Pixels;


class Pixel
{
    private $data;


    private $properties = [
        'coordinate_x',
        'coordinate_y',
        'color',
        'email'
    ];


    public function __construct(?array $data = null)
    {
        if ($data !== null) {
            $this->_setData($data);
        }
    }

    public function setCoordinateX(int $x)
    {
        $this->data['coordinate_x'] = $x;
    }
    public function getCoordinateX()
    {
        return $this->data['coordinate_x'] ?? null;
    }

    public function setCoordinateY(int $y)
    {
        $this->data['coordinate_y'] = $y;
    }
    public function getCoordinateY()
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
        foreach ($this->properties as $property) {
            $method = 'set' . str_replace('_', '', $property);
            if (is_callable(array($this, $method))) {
                $this->$method($data[$property]);
                var_dump('viskas gerai');
                var_dump($data);
            } else {
                $this->data[$property] = $data[$property] ?? null;
            }
        }
    }

    public function _getData()
    {
            foreach ($this->properties as $property) {
                $method = 'get' . str_replace('_', '', $property);
                if (is_callable(array($this, $method))) {
                    $data[$property] = $this->$method();
                } else {
                    $data[$property] = null;
                }
            }
            return $data;
    }
}
