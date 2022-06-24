function onSpotifyJson(json) {
  const songs = document.querySelector('#result-view');
  songs.innerHTML = '';
  const ricerca = json.tracks;

  for(let i in ricerca) {
    const track_data = ricerca[i];
    const track = track_data.titolo;
    const artist = track_data.artista;
    const imm_album = track_data.img.url;
    const song = document.createElement('div');
    song.classList.add('song');
    const img = document.createElement('img');
    img.src = imm_album;
    const titolo = document.createElement('span');
    titolo.classList.add('titolo');
    titolo.textContent = track;
    const artista = document.createElement('span');
    artista.classList.add('artista');
    artista.textContent = artist;
    const id = document.createElement('p');
    id.textContent = track_data.id;

    const preferito = document.createElement('a');
    if(track_data.preferito == true) {
      preferito.innerText = "Già nei preferiti";
      preferito.classList.add('added');
    } else {
      preferito.innerText = "Agg. a preferiti";
      preferito.addEventListener('click', addPreferito);
    }

    const playlist = document.createElement('a');
    playlist.setAttribute('id', 'playlist');
    if(track_data.playlist == true) {
      playlist.innerText = "Già nella playlist";
      playlist.classList.add('added');
    } else {
      playlist.innerText = "Agg. alla playlist";
      playlist.addEventListener('click', addPlaylist);
    }

    song.appendChild(img);
    song.appendChild(titolo);
    song.appendChild(artista);
    song.appendChild(id);
    song.appendChild(preferito);
    song.appendChild(playlist);
    songs.appendChild(song);
  }
  
  if(json.previous !== null) {
    const prec = document.querySelector('#prec');
    prec.classList.remove('hidden');
    prec.value = json.previous;
    prec.addEventListener('click', pagPrec);
  } else {
    const prec = document.querySelector('#prec');
    prec.classList.add('hidden');
    prec.removeEventListener('click', pagPrec);
  }

  if(json.next !== null) {
    const succ = document.querySelector('#succ');
    succ.classList.remove('hidden');
    succ.value = json.next;
    succ.addEventListener('click', pagSucc);
  } else {
    const succ = document.querySelector('#succ');
    succ.classList.add('hidden');
    succ.removeEventListener('click', pagSucc);
  }
}

function onJsonAdd(json) {
  console.log("Aggiunto: "+ json.esito);
}

function onResponse(response) {
  return response.json();
}

function ricerca(event) {
  event.preventDefault();
  
  const song = document.querySelector('#song');
  const song_title = encodeURIComponent(song.value);

  fetch(BASE_URL+"/search/"+song_title).then(onResponse).then(onSpotifyJson);

}

function addPlaylist(event) {
  const button = event.currentTarget;
  const token = document.querySelector('input[name="_token"]');

  const formData = new FormData();
  formData.append('id', button.parentNode.querySelector('p').textContent);
  formData.append('img', button.parentNode.querySelector('img').src);
  formData.append('title', button.parentNode.querySelector('.titolo').textContent);
  formData.append('artist', button.parentNode.querySelector('.artista').textContent);

  fetch(BASE_URL+"/addtoplay", {method: 'post', headers: {'X-CSRF-TOKEN': token.value}, body: formData}).then(onResponse).then(onJsonAdd);

  button.parentNode.querySelector('#playlist').innerText = "Aggiunto!"
  button.parentNode.querySelector('#playlist').classList.add('added');
}

function addPreferito(event) {
  const button = event.currentTarget;
  const token = document.querySelector('input[name="_token"]');

  const formData = new FormData();
  formData.append('id', button.parentNode.querySelector('p').textContent);
  formData.append('img', button.parentNode.querySelector('img').src);
  formData.append('title', button.parentNode.querySelector('.titolo').textContent);
  formData.append('artist', button.parentNode.querySelector('.artista').textContent);

  fetch(BASE_URL+"/addtopref", {method: 'post', headers: {'X-CSRF-TOKEN': token.value}, body: formData}).then(onResponse).then(onJsonAdd);

  button.parentNode.querySelector('a').innerText = "Aggiunto!"
  button.parentNode.querySelector('a').classList.add('added');
}

function pagSucc(event) {
  const link = document.querySelector('#succ').value;
  const token = document.querySelector('input[name="_token"]');

  const formData = new FormData();
  formData.append('url', link);

  fetch(BASE_URL+"/search/next", {method: 'post', headers: {'X-CSRF-TOKEN': token.value}, body: formData}).then(onResponse).then(onSpotifyJson);
}

function pagPrec(event) {
  const link2 = document.querySelector('#prec').value;
  const token = document.querySelector('input[name="_token"]');

  const formData = new FormData();
  formData.append('url', link2);

  fetch(BASE_URL+"/search/prev", {method: 'post', headers: {'X-CSRF-TOKEN': token.value}, body: formData}).then(onResponse).then(onSpotifyJson);
}

function mobileMenu(menu) {
  menu.classList.toggle('open');
}

const ricSpo = document.querySelector('#spotify');
ricSpo.addEventListener('submit', ricerca);
