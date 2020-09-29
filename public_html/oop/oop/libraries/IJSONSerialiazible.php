<?php
// Interface (Sąsaja) tai yra klasei skirta struktūra,
// kuri užtikrina sąsają implementuojančias klases realizuoti sąsajoje aprašytus metodus.
interface IJSONSerialiazible
{
  public function toJSON(): string;
  public function toAssocArr(): array;
  public static function createFromAssocArr(array $arr): object;
}
