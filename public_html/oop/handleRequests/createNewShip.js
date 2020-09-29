const form = document.querySelector('#createNewShip');
form.addEventListener('submit', (e) => {
  e.preventDefault();
  const inputs = Array.from(form.querySelectorAll('[name]'));
  const formData = new FormData();
  formData.append('brand', inputs[0].value);
  formData.append('model', inputs[1].value);
  formData.append('roomCount', Number(inputs[2].value));
  for (let i = 0; i < inputs[3].files.length; i++) {
    formData.append("images[]", inputs[3].files[i]);
  }
  formData.append('description', inputs[4].value);
  fetch('http://' + window.location.hostname + '/handleRequests/createNewShip.php', { method: 'POST', body: formData })
    .then(res => res.json())
    .then((data => {
      console.log(data);
    }))
    .catch(() => {
      alert('Kazkas blogai su ivedimu, \n\t -Ponia validacija-')
    })
});