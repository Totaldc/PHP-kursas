<?php


interface IJSONSerializible
{
    public  function toJson(): string;
    public  function fromJson(): void;
}
