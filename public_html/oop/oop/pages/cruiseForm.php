<!-- 
  Sudaryti formą, naujiems kruizams kurti
  1. Maršrutas
    HTML select elementas, kuriame būtų galimų uostų pasirinkimas
  2. Pasirinkus kiekvieną uostą, jam būtų parenkamas atvykimo ir išvykimo laikai
    2 atskiri datos pasirinkimos įvesties laukai
  3. Nuotraukų pasirinkimas, turi priimti daug nuotraukų
    input[type=file] 
  4. Laivas
    HTML select elementas, kuriame būtų visi galimi laivai
 -->
<div class="container">
  <form method="POST" class="form">
    <h2>Naujo kruizo kūrimas</h2>
    <!-- 1 -->
    <div class="justify-space-between-horizontaly">

      <div class="form-group">
        <label for="start-location">Pradinė stotelė</label>
        <select id="start-location">
          <option value="">Monako</option>
          <option value="">Rome</option>
          <option value="">Rome</option>
          <option value="">Rome</option>
        </select>
      </div>
      <div class="form-group">
        <label for="finish-location">Galutinė stotelė</label>
        <select id="finish-location">
          <option value="">Monako</option>
          <option value="">Rome</option>
          <option value="">Rome</option>
          <option value="">Rome</option>
        </select>
      </div>
      <!-- 2 -->
      <div class="form-group">
        <label for="start-time">Išvykimo laikas</label>
        <input type="date" id="start-date">
      </div>
      <div class="form-group">
        <label for="finish-date">Atvykimo laikas</label>
        <input type="date" id="finish-date">
      </div>

      <!-- 3 -->
      <div class="form-group">
        <label for="images">Reklaminės nuotraukos</label>
        <input type="file" id="images" accept="image/x-png,image/gif,image/jpeg" multiple>
      </div>
      <!-- 4 -->
      <div class="form-group">
        <label for="ship">Kruizinis laivas</label>
        <select id="ship">
          <option value="">Brandas Modelis</option>
          <option value="">Kakala Upata</option>
          <option value="">Kibir Rudylan</option>
        </select>
      </div>
    </div>
    <div class="justify-center-horizontaly my-1">
      <button class="btn">Sukurti naują kruizą</button>
    </div>
  </form>
</div>