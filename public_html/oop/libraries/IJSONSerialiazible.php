<?php

interface IJSONSerialiazible
{
  public function toJSON(): string;
  public function toAssocarr(): array;
  public function createFromAssocArr($arr): object;
}
