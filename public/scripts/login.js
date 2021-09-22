'use strict';

const btnLogin = document.querySelector('.btn-send');
const url = 'http://localhost';

function validateFields(f1, f2) {
    f1.style.borderBottom = '3px solid #f00';
    if (f2.value == '') {
        f2.style.borderBottom = '3px solid #f00';
    } else {
        f2.style.borderBottom = '3px solid #0f0';
    }
}

btnLogin.addEventListener('click', function(e){
    e.preventDefault();
    const username = document.forms['Login']['username'];
    const password = document.forms['Login']['password'];
    if (username.value == '') {
        validateFields(username, password);
        return false;
    }
    if (password.value == '') {
        validateFields(password, username);
        return false;
    }
    let data = new FormData();
    data.append('username', username.value);
    data.append('password', password.value);
    fetch(`${url}/Login/validateUser`,{
        method : 'POST',
        body : data
    }).then(function(res){
        if (res.ok) {
            return res.json();
        } else {
            throw "Error in the request";
        }
    }).then(function(res){
        if (res['ok']) {
            window.location.assign(res['url']);
        } else {
            alert(res['msg']);
        }
    }).catch(function(e){
        console.log(e);
    });
});
