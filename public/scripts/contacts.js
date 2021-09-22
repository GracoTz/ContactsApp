'use strict';

const url = 'http://localhost';
const buttons = document.querySelectorAll('.btn-delete');
const btnBack = document.querySelector('#back');

buttons.forEach(button => {
    button.addEventListener('click', function () {
        const id = this.dataset.id;
        const name = this.dataset.name;
        const confirm = window.confirm("Are you sure you shoul delete the contact " + name);
        if (confirm) {
            fetch(url+"/Contacts/deleteContact/"+id);
            const fatherNode = document.querySelector('.container');
            const childNode = document.querySelector('#row-' + id);
            fatherNode.removeChild(childNode);
        }
    });
});

btnBack.addEventListener('click', function () {
    window.location.assign(url+'/Profile');
});
