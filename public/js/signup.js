function controllaCampi(event) {
  if((nome.value.length === 0) || (cognome.value.length === 0) || (usr.value.length === 0) || (em.value.length === 0) || (pass.value.length === 0) || (c_pass.value.length === 0)) {
    event.preventDefault();
    document.querySelector('#error').innerHTML = "Inserisci tutti i campi";
    document.querySelector('#error').classList.add('log_error');
  }
}

function userJson(json) {
  if(json.esiste == true) {
    document.querySelector('.username span').textContent = "Nome utente già esistente!";
    document.querySelector('.username span').classList.add('errore');
  } else {
    document.querySelector('.username span').textContent = "";
    document.querySelector('.username span').classList.remove('errore');
  }
}

function emailJson(json) {
  if(json.esiste == true) {
    document.querySelector('.email span').textContent = 'E-mail già usata!';
    document.querySelector('.email span').classList.add('errore');
  } else {
    document.querySelector('.email span').textContent = '';
    document.querySelector('.email span').classList.remove('errore');
  }
}

function onResponse(response) {
  return response.json();
}

function chkNome(event) {
  const nom =document.querySelector('.nome input');

  if(nom.value.length == 0) {
    nom.parentNode.parentNode.querySelector('span').textContent = 'Non hai scritto bene il tuo nome!';
    nom.parentNode.parentNode.querySelector('span').classList.add('errore');
  } else {
    nom.parentNode.parentNode.querySelector('span').textContent = '';
    nom.parentNode.parentNode.querySelector('span').classList.remove('errore');
  }
}

function chkCognome(event) {
  const cog = document.querySelector('.cognome input');
  if(cog.value.length == 0) {
    cog.parentNode.parentNode.querySelector('span').textContent = 'Non hai scritto bene il tuo cognome!';
    cog.parentNode.parentNode.querySelector('span').classList.add('errore');
  } else {
    cog.parentNode.parentNode.querySelector('span').textContent = '';
    cog.parentNode.parentNode.querySelector('span').classList.remove('errore');
  }
}

function chk_user(event) {
  const user = document.querySelector('.username input');
  if(!/^[a-zA-Z0-9]{1,8}$/.test(user.value)) {
    user.parentNode.parentNode.querySelector('span').textContent = 'Username non valido! (max. 8 caratteri)';
    user.parentNode.parentNode.querySelector('span').classList.add('errore');
  } else {
    const u = encodeURIComponent(user.value);
    fetch(BASE_URL+"/username/"+u).then(onResponse).then(userJson);
  }
}

function chk_email(event) {
  const email = document.querySelector('.email input');
  if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email.value)) {
    email.parentNode.parentNode.querySelector('span').textContent = 'E-mail non valida!';
    email.parentNode.parentNode.querySelector('span').classList.add('errore');
  } else {
    const e = encodeURIComponent(email.value);
    fetch(BASE_URL+"/email/"+e).then(onResponse).then(emailJson);
  }
}

function chkPassword(event) {
  const passw = document.querySelector('.password input');
  if(passw.value.length < 8) {
    passw.parentNode.parentNode.querySelector('span').textContent = 'Password troppo corta! (min. 8 caratteri)';
    passw.parentNode.parentNode.querySelector('span').classList.add('errore');
  } else {
    passw.parentNode.parentNode.querySelector('span').textContent = '';
    passw.parentNode.parentNode.querySelector('span').classList.remove('errore');
  }
}

function chkConfermaPassword(event) {
  const c_pass= document.querySelector('.conferma_password input');
  const pass = document.querySelector('.password input');
  if(c_pass.value === pass.value) {
    c_pass.parentNode.parentNode.querySelector('span').textContent = '';
    c_pass.parentNode.parentNode.querySelector('span').classList.remove('errore');
  } else {
    c_pass.parentNode.parentNode.querySelector('span').textContent = 'Le password non coincidono!';
    c_pass.parentNode.parentNode.querySelector('span').classList.add('errore');
  }
}

const nome = document.querySelector('.nome input');
nome.addEventListener('blur', chkNome);
const cognome = document.querySelector('.cognome input');
cognome.addEventListener('blur', chkCognome);
const usr = document.querySelector('.username input');
usr.addEventListener('blur', chk_user);
const em = document.querySelector('.email input');
em.addEventListener('blur', chk_email);
const pass = document.querySelector('.password input');
pass.addEventListener('blur', chkPassword);
const c_pass = document.querySelector('.conferma_password input');
c_pass.addEventListener('blur', chkConfermaPassword);

const form = document.querySelector('form').addEventListener('submit', controllaCampi);