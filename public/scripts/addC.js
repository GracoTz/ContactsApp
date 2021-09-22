'use strict';

const btnSend = document.querySelector('#btn-send');
const url = 'http://localhost';

btnSend.addEventListener('click', function(e){
    e.preventDefault();
    const name = document.forms['ADD']['name'].value;
    const phone = document.forms['ADD']['phone'].value;
    if (name == '') {
        alert('Enter a contact name');
        return false;
    }
    if (phone == '') {
        alert('Enter a contact phone');
        return false;
    }
    if (isNaN(parseInt(phone))) {
        alert('Enter an Integer number');
        return false;
    }
    if (phone.length < 7) {
        alert('The Phone Number could be more large than 7');
        return false;
    }
    let data = new FormData();
    data.append('name', name);
    data.append('phone', phone);
    fetch(`${url}/Contacts/createNewContact`, {
        method : 'POST',
        body : data
    }).then(res => {
        if (res.ok) {
            return res.json();
        } else {
            throw "Error";
        }
    }).then(res => {
        console.log(res['msg']);
    }).catch(e => {
        console.log(e);
    })
});
