<?php
class FileDataBase
{
  public static function writeIJSONSerialiaziblesToFile(array $iJSONSerialiazibles, string $filename)
  {
    $filename = DATA_FILES . $filename;
    $jsonArray = [];
    foreach ($iJSONSerialiazibles as $iJSONSerialiazible) {
      if (!($iJSONSerialiazible instanceof IJSONSerialiazible))
        throw new Exception("Stop must be an instance of IJSONSerialiazible interface.");
      $jsonArray[] = $iJSONSerialiazible->toJSON();
    }
    $data = "[" . implode(',', $jsonArray) . "]";
    file_put_contents($filename, $data);
  }

  public static function readJSON(string $filename): array{
    $filename = DATA_FILES . $filename;
    return json_decode(file_get_contents($filename), true);
  }
}
