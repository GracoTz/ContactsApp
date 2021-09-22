'use strict';

const photofile = document.forms['Register']['photo'];
const label = document.querySelector('.button-photo');
const photoContainer = document.querySelector('.container__photo');
let btnDel, span;
let binary = 0;

function spanElement() {
    const span = document.createElement('span');
    const text = document.createTextNode('X');
    span.classList.add('btn-del-photo');
    span.appendChild(text);
    return span;
}

function createBtnDeletePhoto(label,span,cont,btn,file) {
    label.classList.add('button-photo-file');
    span = spanElement();
    cont.appendChild(span);
    btn = document.querySelector(".btn-del-photo");
    btn.addEventListener('click', function () {
        file.value = '';
        label.classList.remove('button-photo-file');
        label.classList.add('button-photo');
        binary = 0;
        cont.removeChild(span);
    });
}

function validateFields(ev, f1, f2) {
    ev.style.borderBottom = '3px solid #f00';
    if (f1.value == '') {
        f1.style.borderBottom = '3px solid #f00';
    } else {
        f1.style.borderBottom = '3px solid #0f0';
    }
    if (f2.value == '') {
        f2.style.borderBottom = '3px solid #f00';
    } else {
        f2.style.borderBottom = '3px solid #0f0';
    }
}

photofile.addEventListener('change', function(e){
    if (binary == 0) {
        binary = 1;
        label.classList.remove('button-photo');
        createBtnDeletePhoto(label,span,photoContainer,btnDel,photofile);
    }
});

// Validate Register
function validateRegister() {
    const fullname = document.forms['Register']['name'];
    const username = document.forms['Register']['username'];
    const password = document.forms['Register']['password'];

    if (fullname.value == '') {
        validateFields(fullname, username, password);
        return false;
    }
    
    if (fullname.value.search(/^[a-zA-Z ]*$/g)) {
        validateFields(fullname, username, password);
        return false;
    } 
    
    if (username.value == '') {
        validateFields(username, fullname, password);
        return false;
    } 
    
    if (password.value == '') {
        validateFields(password, username, fullname);
        return false;
    }

    if (photofile.value == '') {
        alert('You must put any photo');
        return false;
    }
}