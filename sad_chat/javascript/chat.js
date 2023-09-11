const form =document.querySelector(".text_box"),
input_field =document.querySelector(".input_field"),
sendBTN =document.querySelector("button"),
chat_box =document.querySelector(".chat_box");

form.onsubmit = (e) =>{
    e.preventDefault();
}

sendBTN.onclick = () =>{
    // console.log("help god");
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/insert_chat.php", true);
    xhr.onload = () =>{
        if(xhr.readyState == 4 && xhr.status == 200){
            let data = xhr.response;
            // console.log(data);
            input_field.value = ""; //blank after sending to db
            scroll_btm();
        }
    }
    let form_data =new FormData(form);
    xhr.send(form_data);
}
chat_box.onmouseenter = () =>{
    chat_box.classList.add("working");
}
chat_box.onmouseleave = () =>{
    chat_box.classList.remove("working");
}
setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/get_chat.php", true);
    xhr.onload = () =>{
        if(xhr.readyState == 4 && xhr.status == 200){
            let data = xhr.response;
            console.log(data);
            chat_box.innerHTML = data;
            if(!chat_box.classList.contains("working")){
            scroll_btm();
            }
        }
    }
    let form_data =new FormData(form);
    xhr.send(form_data);
}, 500);

scroll_btm = () =>{
    chat_box.scrollTop = chat_box.scrollHeight;
}
