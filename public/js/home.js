function onContentJson(json) {
  const space = document.querySelector('#dettagli');

  for(let i in json) {
    const tit = json[i].titolo;
    const img_link = json[i].img;
    const desc = json[i].descrizione;
    const content = document.createElement('div');
    const img = document.createElement('img');
    img.src = img_link;
    const titolo = document.createElement('h1');
    titolo.innerText = tit;
    const descrizione = document.createElement('p');
    descrizione.innerText  = desc;
    content.appendChild(img);
    content.appendChild(titolo);
    content.appendChild(descrizione);
    space.appendChild(content); 
  }
}

function onEvidenzaJson(json) {
  const evid =  document.querySelector('#inEvidenza-view');

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
    if(json[i].preferito == true) {
      preferito.innerText = "Già nei preferiti";
      preferito.classList.add('added');
    } else {
      preferito.innerText = "Agg. a preferiti";
      preferito.addEventListener('click', addPreferito);
    }

    const playlist = document.createElement('a');
    playlist.setAttribute('id', 'playlist');
    if(json[i].playlist == true) {
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
    evid.appendChild(song);
  }
}

function onJsonPref(json) {
  console.log("Aggiunto: "+ json.esito);
}

function onContentResponse(response) {
  return response.json();
}

function carica_contents() {
  fetch("/contents").then(onContentResponse).then(onContentJson);
}

function carica_inEvidenza() {
  fetch("/inevidenza").then(onContentResponse).then(onEvidenzaJson);
}

function addPreferito(event) {
  const button = event.currentTarget;
  const token = document.querySelector('input[name="_token"]');

  const formData = new FormData();
  formData.append('id', button.parentNode.querySelector('p').textContent);
  formData.append('img', button.parentNode.querySelector('img').src);
  formData.append('title', button.parentNode.querySelector('.titolo').textContent);
  formData.append('artist', button.parentNode.querySelector('.artista').textContent);

  fetch(BASE_URL+"/addtopref", {method: 'post', headers: {'X-CSRF-TOKEN': token.value}, body: formData}).then(onContentResponse).then(onJsonPref);

  button.parentNode.querySelector('a').innerText = "Aggiunto!"
  button.parentNode.querySelector('a').classList.add('added');
}

function addPlaylist(event) {
  const button = event.currentTarget;
  const token = document.querySelector('input[name="_token"]');

  const formData = new FormData();
  formData.append('id', button.parentNode.querySelector('p').textContent);
  formData.append('img', button.parentNode.querySelector('img').src);
  formData.append('title', button.parentNode.querySelector('.titolo').textContent);
  formData.append('artist', button.parentNode.querySelector('.artista').textContent);

  fetch(BASE_URL+"/addtoplay", {method: 'post', headers: {'X-CSRF-TOKEN': token.value}, body: formData}).then(onContentResponse).then(onJsonPref);

  button.parentNode.querySelector('#playlist').innerText = "Aggiunto!"
  button.parentNode.querySelector('#playlist').classList.add('added');
}

function mobileMenu(menu) {
  menu.classList.toggle('open');
}


carica_contents();
carica_inEvidenza();