function onPrefJson(json) {
  const prefs =  document.querySelector('#preferiti-view');

  for(let i in json) {
    const album_img = json[i].img;
    const title = json[i].titolo;
    const artist = json[i].artista;
    const song = document.createElement('div');
    song.classList.add('song');
    const img = document.createElement('img');
    img.src = album_img;
    const titolo = document.createElement('span');
    titolo.classList.add('titolo');
    titolo.textContent = title;
    const artista = document.createElement('span');
    artista.classList.add('artista');
    artista.textContent = artist;
    id = document.createElement('p');
    id.textContent = json[i].musicid;
    const preferito = document.createElement('a');
    preferito.setAttribute('id', 'preferito');
    preferito.innerText = "Rimuovi dai pref.";
    preferito.addEventListener('click', removePreferito);    
    song.appendChild(img);
    song.appendChild(titolo);
    song.appendChild(artista);
    song.appendChild(id);
    song.appendChild(preferito);
    prefs.appendChild(song);
  }
}

function removePrefJson(json) {
  if(json.esito == true) {
    const result = document.querySelector('#preferiti-view');
    result.innerHTML = '';
    caricaPreferiti();
  }
}

function onResponse(response) {
  return response.json();
}

function caricaPreferiti() {
  fetch(BASE_URL+"/prefs").then(onResponse).then(onPrefJson);
}

function removePreferito(event) {
  const button = event.currentTarget;
  const token = document.querySelector('input[name="_token"]');

  const formData = new FormData();
  formData.append('musicid', button.parentNode.querySelector('p').textContent);

  fetch(BASE_URL+"/remove", {method: 'post', headers: {'X-CSRF-TOKEN': token.value}, body: formData}).then(onResponse).then(removePrefJson);

}

function mobileMenu(menu) {
  menu.classList.toggle('open');
}

caricaPreferiti();