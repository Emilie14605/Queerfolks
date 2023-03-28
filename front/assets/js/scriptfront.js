// Partie Page d'accueil (index)

// Partie Page de connexion/inscription (login)

const btnRegister = document.querySelector('.btn-registerform');
const btnLogin = document.querySelector('.btn-loginform');
const formRegister = document.getElementsByName('form-register')[0];
const formLogin = document.getElementsByName('form-login')[0];

btnRegister.addEventListener('click', function() {
  formRegister.style.display = 'block';
  formLogin.style.display = 'none';
});

btnLogin.addEventListener('click', function() {
    formRegister.style.display = 'none';
    formLogin.style.display = 'block';
  });
// Partie Page Profile (profil)

// Partie Page de recherche (search)

// Partie Page paramètres (parameters)

// Partie Page contact et mentions légales (contact)

// Partie Page messagerie (messages)

// Partie Page blogs (blogs)