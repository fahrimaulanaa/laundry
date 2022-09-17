function showPassword(){
    var password = document.getElementById("password");
    if(password.type === "password"){
        password.type = "text";
    }else{
        password.type = "password";
    }
}

function showSettings(){
    var btn = document.getElementById("user-menu");
    var usrstg = document.getElementById("user-settings");

    btn.addEventListener("click", function(){
        usrstg.classList.toggle("hidden");
    });
}
//if screen is less than 768px make hamburger menu 
function showMenu(){
    var btn = document.getElementById("hamburger");
    var menu = document.getElementById("menu");
    btn.addEventListener("click", function(){
        menu.classList.toggle("hidden");
    });
}