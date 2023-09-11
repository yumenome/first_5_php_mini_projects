const eye_icon = document.querySelector(".eye_icon");
const eye_off = document.querySelector(".eye_off");
const pwdTAG = document.querySelector(".pwd");

eye_icon.onclick = () =>{
    if(pwdTAG.type == "password" && pwdTAG.value.length > 0){
        pwdTAG.type = "text";
        eye_icon.style.display ="none";
        eye_off.style.display ="block";
    }
}
eye_off.onclick = () =>{
    if(pwdTAG.type == "text"){
    pwdTAG.type = "password";
    eye_icon.style.display ="block";
    eye_off.style.display ="none";
    }
}