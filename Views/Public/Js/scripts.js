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


