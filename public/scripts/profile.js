'use strict';

const btnMenu = document.querySelector('.btn-submenu');
const dropdowns = document.querySelector(".dropdown-content");
const profilePhoto = document.querySelector('.user-photo');
const url = 'http://localhost';

btnMenu.addEventListener('click', function() {
    this.classList.toggle("change");
    dropdowns.classList.toggle("active");
    if (dropdowns.classList.contains("active")) {
        dropdowns.style.display = 'block';
    } else {
        dropdowns.style.display = 'none';
    }
});

fetch(url+"/Profile/getProfileImage")
.then(function(response){
    if (response.ok) {
        return response.json();
    } else {
        throw "Error to capture the image";
    }
}).then(function(response){
    profilePhoto.style.background = `url(${url}/public/usersPhotos/${response['img']})`;
    profilePhoto.style.backgroundPosition = 'center';
    profilePhoto.style.backgroundRepeat = 'no-repeat';
    profilePhoto.style.backgroundSize = 'cover';
}).catch(function(err){
    console.log(err);
});

fetch(url+"/Profile/getContactsAmount")
.then(function(response){
    if (response.ok) {
        return response.text();
    } else {
        throw "Error en la solicitud";
    }
}).then(function(res){
    document.querySelector("#num").innerHTML = res;
}).catch (function(err){
    console.log(err);
});
