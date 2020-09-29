<?php
abstract class Tube {
    protected $name = 'Tube';

    abstract protected function getName();
}

class YouTube extends Tube {
    protected $name = 'YouTube';

    public function getName() {
        return $this->name;
    }
}

$youtube = new YouTube();
print $youtube->getName();