function controllaCampi(event) {
  if((user.value.length === 0) || (pass.value.length === 0)) {
    event.preventDefault();
    document.querySelector('#error').innerHTML = "Inserisci tutti i campi";
  }
}

const user = document.querySelector('.username input');
const pass = document.querySelector('.password input');

const form = document.querySelector('form').addEventListener('submit', controllaCampi);