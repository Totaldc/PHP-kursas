<?php
class Ship implements IJSONSerialiazible
{
  // Primary props
  private string $brand;
  private string $model;
  private array $rooms;
  // Secondary props
  private string $description;
  private array $images;


  public function __construct(string $brand, string $model, string $rooms)
  {
    $this->brand = $brand;
    $this->model = $model;
    $this->rooms = array_fill(0, $rooms, [
      'spaces' => 2,
      'type' => 'C',
      'taken' => false
    ]);
    $this->images = [];
  }


  public static function createFromAssocArr($arr): object
  {
    return (object)[];
  }
  /**
   * Adds image to advertisment image array 
   * 
   * @param string $imgPath img to be added to advertisment image array.
   */
  public function addImage(string $imgPath): void
  {
    $this->images[] = $imgPath;
  }

  /**
   * Renders ship as row (for cruise card)
   */
  public function renderAsRow(): void
  {
?>
    <div class="ship">
      <img class="ship__img" src="<?= $this->images[0] ?>" alt="<?= $this->brand . '-' . $this->model ?>">
      <div class="ship__content">
        <div class="ship__name"><?= $this->brand . ' ' . $this->model ?></div>
        <p class="ship__description"><?= $this->description ?? '' ?></p>
      </div>
    </div>
<?php
  }


  public function toJSON(): string
  {
    return json_encode($this->toAssocArr());
  }

  public function toAssocArr(): array
  {
    return [
      "brand" => $this->brand,
      "model" => $this->model,
      "rooms" => $this->rooms,
      "description" => $this->description ?? '',
      "images" => $this->images,
    ];
  }


 
}
