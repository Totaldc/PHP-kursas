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
                $this->setCoordinateX($data['coordinate_x']);
                $this->setCoordinateY($data['coordinate_y']);
                $this->setColor($data['color']);
                $this->setEmail($data['email']);
                var_dump('nelabai, bet gerai');
            }
         }
    }

    public function _getData()
    {
        // $arrData['x'] = $this->getX();
        // $arrData['y'] = $this->getY();
        // $arrData['color'] = $this->getColor();
        // $arrData['email'] = $this->getEmail();

        // return $arrData;

        return [
            'coordingate_x' => $this->getCoordinateX(),
            'coordinate_y' => $this->getCoordinateY(),
            'color' => $this->getColor(),
            'email' => $this->getEmail(),
        ];
    }
}
