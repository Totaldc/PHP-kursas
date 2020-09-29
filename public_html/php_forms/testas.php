<?php
abstract class Tube {
    protected $name = 'Tube';

    abstract protected function getName();
}

class YouTube extends Tube {
    public function getName() {
        return $this->name;
    }
}