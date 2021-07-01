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

function testb(){
    console.log('123');
    var $inputs = $('#rrrr :input');

    // An array of just the ids...
    var ids = {};
    var x = 0;
    var myTab = [];
    $inputs.each(function (index)
    {
        // For debugging purposes...
        alert($(this).attr('name') + ' : ' + $(this).val());

        ids[$(this).attr('name')] = $(this).val;
        myTab[$(this).attr('name')] = $(this).val();
    });
    console.log(myTab); 
}


