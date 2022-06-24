function onJsonPlaylist(json) {
  const play =  document.querySelector('#playlist-view');

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
    const remove = document.createElement('a');
    remove.innerText = "Rimuovi dalla playlist";
    remove.addEventListener('click', removeSong);    
    song.appendChild(img);
    song.appendChild(titolo);
    song.appendChild(artista);
    song.appendChild(id);
    song.appendChild(remove);
    play.appendChild(song);
  }
}

function removeSongJson(json) {
  if(json.esito == true) {
    const result = document.querySelector('#playlist-view');
    result.innerHTML = '';
    caricaPlaylist();
  }
}

function onResponse(response) {
  return response.json();
}

function caricaPlaylist() {
  fetch(BASE_URL+"/getplay").then(onResponse).then(onJsonPlaylist);
}

function removeSong(event) {
  const button = event.currentTarget;
  const token = document.querySelector('input[name="_token"]');

  const formData = new FormData();
  formData.append('musicid', button.parentNode.querySelector('p').textContent);

  fetch(BASE_URL+"/remove", {method: 'post', headers: {'X-CSRF-TOKEN': token.value}, body: formData}).then(onResponse).then(removeSongJson);

}

function mobileMenu(menu) {
  menu.classList.toggle('open');
}

caricaPlaylist();