<div class="container">
  <form method="POST" class="form">
    <h2>Naujo laivo kūrimas</h2>
    <div class="justify-space-between-horizontaly">
      <div class="form-group">
        <label for="brand">Markė</label>
        <input type="text" id="brand">
      </div>
      <div class="form-group">
        <label for="model">Modelis</label>
        <input type="text" id="model">
      </div>
      <div class="form-group">
        <label for="room-count">Kambarių skaičius</label>
        <input type="text" id="room-count">
      </div>
      <div class="form-group">
        <label for="images">Nuotraukos</label>
        <input type="file" id="images" accept="image/x-png,image/gif,image/jpeg" multiple>
      </div>
    </div>
    <div class="form-group">
      <label for="description">Aprašymas</label>
      <textarea id="description"></textarea>
    </div>
    <div class="justify-center-horizontaly my-1">
      <button class="btn">Pridėti naują laivą</button>
    </div>
  </form>
</div>