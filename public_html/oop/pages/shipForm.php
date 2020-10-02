<div class="container">
  <form id="createNewShip" method="POST" action="<?= REQUEST_HANDLERS_PATH ?>createNewShip.php" class="form">
    <h2>Naujo laivo kūrimas</h2>
    <div class="justify-space-between-horizontaly">
      <div class="form-group">
        <label for="brand">Markė</label>
        <input type="text" id="brand" name="brand">
      </div>
      <div class="form-group">
        <label for="model">Modelis</label>
        <input type="text" id="model" name="model">
      </div>
      <div class="form-group">
        <label for="room-count">Kambarių skaičius</label>
        <input type="text" id="room-count" name="roomCount">
      </div>
      <div class="form-group">
        <label for="images">Nuotraukos</label>
        <input type="file" id="images" accept="image/x-png,image/gif,image/jpeg" multiple name="images">
      </div>
    </div>
    <div class="form-group">
      <label for="description">Aprašymas</label>
      <textarea id="description" name="description"></textarea>
    </div>
    <div class="justify-center-horizontaly my-1">
      <button class="btn">Pridėti naują laivą</button>
    </div>
  </form>
</div>
<script src="<?= DOMAIN_NAME ?>handleRequests/createNewShip.js"></script>