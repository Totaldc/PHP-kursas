<?php

interface IJSONSerialiazible
{
  public function toJSON(): string;
  public function toAssocArr(): array;
  public static function createFromAssocArr(array $arr): object;
}
