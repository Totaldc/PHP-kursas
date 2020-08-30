<?php
// PRISIJUNGIMAS
$users = [
  [
    'id' => 'olksajdfngjdsafng',
    'email' => 'zilvinas.vidmantas.93@gmail.com',
    'password' => 'Labas123',
    'role' => 'default'
  ],
  [
    'id' => 'olksajdfnfdisafng',
    'email' => 'admin@gmail.com',
    'password' => 'Labas123',
    'role' => 'admin'
  ]
];
function validateUser($email, $password)
{
  // Kai užaugsiu būsiu duomenų bazė
  global $users;
  foreach ($users as $user) {
    if ($email === $user['email'] && $password === $user['password']) {
      return $user;
    }
  }
  return false;
}
if (isset($_POST['email']) && isset($_POST['email'])) {
  // Kai uždaugsiu būsiu validacija;
  $userValidated = validateUser($_POST['email'], $_POST['password']);
}
?>
<form class="form" method="POST">
  <div class="form__title">Prisijungimas</div>
  <div class="input-group">
    <label for="email">Paštas</label>
    <input type="email" id="email" name="email">
  </div>
  <div class="input-group">
    <label for="password">Slaptažodis</label>
    <input type="password" id="password" name="password">
  </div>
  <button type="submit">Prisijungti</button>
</form>
<?php if (isset($userValidated)) : ?>
  <?php if ($userValidated) : ?>
    <h3 class="text--success">Prisijunėte sėkmingai</h3>
  <?php else : ?>
    <h3 class="text--error">Prisijungti nepavyko</h3>
  <?php endif; ?>
<?php endif; ?>
<hr>
<!-- REGISTRACIJA -->