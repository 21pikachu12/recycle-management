document.querySelector('.btn').addEventListener('click',showModal);
document.querySelector('.close').addEventListener('click',closeModal);

function showModal(){
    document.querySelector('.background').classList.add('showbackground');
    document.querySelector('.loginform').classList.add('showLoginform');

}

function closeModal(){
    document.querySelector('.background').classList.remove('showbackground');
    document.querySelector('.loginform').classList.remove('showLoginform');

}