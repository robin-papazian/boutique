//INSCRIPTION

// Modal elements 


const modal = document.getElementById('robinSimpleModal');

const modalBtn = document.getElementById('modal-inscription');

const closeBtn = document.getElementsByClassName('closeBtn')[0];

//Modal event 
modalBtn.addEventListener('click', openModal);

closeBtn.addEventListener('click', closeModal);

function openModal(){
   modal.style.display = 'block';
}

function closeModal(){
    modal.style.display = 'none';
}

//Form elements
const formRegister = document.getElementById('register');

//Form event

formRegister.addEventListener('click', makeRegister);

function makeRegister(e){
    e.preventDefault();

    const form = document.querySelectorAll("#formI input");
    const data = new FormData();
    for (let i = 0; i < form.length; i++) {
        data.append(form[i].getAttribute('name'), form[i].value);
        form[i].value = '';
    }

    const xhr = new XMLHttpRequest;
    xhr.open('POST','InscriptionApi.php',true);

    xhr.onload = function(){
        let message = document.getElementById('message-register');
        if (this.responseText === '1'){
            message.innerHTML = 'Merci pour votre confiance';
            setTimeout(function(){
                message.innerHTML = '';
                closeModal(); 
            },2000);
        }else if (this.responseText === '2'){
            message.innerHTML = 'Inscription impossible';
            setTimeout(function(){
                message.innerHTML = '';
                closeModal(); 
            },2000);

        }
        console.log(this.responseText);
    };

    xhr.send(data);


}


//Connexion

const modalC = document.getElementById('ModalConnexion'); //1sr div modal
const modalBtnC = document.getElementById('modal-connexion'); //header
const closeCon = document.getElementById('closeCo'); // * modal

//Modal event 
modalBtnC.addEventListener('click', openConnect);
closeCon.addEventListener('click',closeCo);

function openConnect(){
   modalC.style.display = 'block';
}

function closeCo(){
    modalC.style.display = 'none';
}

const formLogin = document.getElementById('login');

//Form event

formLogin.addEventListener('click', makeLogin);

function makeLogin(e){
    e.preventDefault();

    const formC = document.querySelectorAll("#formC input");
    const user = new FormData();
    for (let i = 0; i < formC.length; i++) {
        user.append(formC[i].getAttribute('name'), formC[i].value);
        formC[i].value = '';
    }

    const xhr = new XMLHttpRequest;
    xhr.open('POST','ConnexionApi.php',true);

    xhr.onload = function(){
        if(this.responseText === ''){
            closeCo();
            document.location.reload();

        }else if(this.responseText === '1'){
            let error = document.getElementById('danger-login');
            error.innerHTML = 'Connexion impossible';
            setTimeout(function(){
                error.innerHTML = '';
                closeCo(); 
            },2000);
        }
       
    };
    xhr.send(user);


}

//Profil


function openProfil(){
    let i = document.getElementById('ModalProfil');
    i.style.display = 'block';
}

function closeProfil(){
    let i = document.getElementById('ModalProfil');
    i.style.display = 'none';
}

const formProfil = document.getElementById('updateProfil');

//Form event

function stop(e){
    e.preventDefault();
}

function updateProfil(e){
    e.preventDefault();
    const formP = document.querySelectorAll("#formProfil input");
    const update = new FormData();
    for (let i = 0; i < formP.length; i++) {
        update.append(formP[i].getAttribute('name'), formP[i].value);
        
    }

    const xhr = new XMLHttpRequest;
    xhr.open('POST','UpdateApi.php',true);
    xhr.send(update);


}