let login = document.querySelector('#login');
let login_btn = document.querySelector('#login_btn');

login_btn.addEventListener('click', () => {
    if(login.classList.contains('hidden')){
        login.classList.remove('hidden');
        this.classList.add('bg-opacity-200');
    }else{
        login.classList.add('hidden');
    }
});