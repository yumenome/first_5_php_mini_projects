const form =document.querySelector(".login form"),
continueBTN =form.querySelector(".btn input");
const error_text = document.querySelector(".error_text");

form.onsubmit = (e) =>{
    e.preventDefault();
}
continueBTN.onclick = () =>{
    // console.log("help god");
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/login.php", true);
    xhr.onload = () =>{
        if(xhr.readyState == 4 && xhr.status == 200){
            let data = xhr.response;
            console.log(data);
            if(data == "done"){

                console.log("hapi");
                location.href= "./users.php";
            }else{
                error_text.textContent = data;
                error_text.style.display = "block";
            }
        }
    }
    let form_data =new FormData(form);
    xhr.send(form_data);
}