<?php
class FileDataBase
{
  /**
   * Šis metodas paverčia obejektų masyvą, JSON fromato masyvų ir išsaugojį jį faile
   * 
   * @param array iJSONSerialiazibles - tai masyvas objektų kurie implementuoja IJSONSerialiazible sąsają
   * @param string filename - tai failo kelias kuriame bus saugomi duomenys JSON formatu
   */
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

  /**
   * Nuskaito duomenys kurie yra išsaugoti JSON fromatu ir paverčia juos asociatyviu masyvu
   * 
   * @param string filename - tai failo kelias kuriame yra saugomi duomenys JSON formatu
   */
  public static function readJSON(string $filename): array{
    $filename = DATA_FILES . $filename;
    return json_decode(file_get_contents($filename), true);
  }
}
