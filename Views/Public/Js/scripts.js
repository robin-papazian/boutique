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
    }

    const xhr = new XMLHttpRequest;
    xhr.open('POST','InscriptionApi.php',true);

    xhr.onload = function(){
        console.log(this.responseText);
    };

    xhr.send(data);


}


//Connexion

const modalC = document.getElementById('ModalConnexion');
const modalBtnC = document.getElementById('modal-connexion');
const closeCon = document.getElementById('closeCo');

//Modal event 
modalBtnC.addEventListener('click', openConnect);
closeCon.addEventListener('click',closeCo);

function openConnect(){
   modalC.style.display = 'block';
}

function closeCo(){
    modalC.style.display = 'none';
}