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