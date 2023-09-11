const form =document.querySelector(".container form"),
shortenBTN =form.querySelector("form button"),
full_url = form.querySelector("input");
const reload=document.querySelector(".reload");

const blur_effect = document.querySelector(".blur_effect");
const popup_box = document.querySelector(".popup_box"),
short_url = popup_box.querySelector("input");
const save_btn = document.querySelector(".save_btn");

const popup_form = document.querySelector(".popup_form"),
copyBTN =popup_form.querySelector(".copy"),
doma = popup_form.querySelector(".doma");

if(reload){
    reload.onclick = () =>{
        console.log("ere");
        setTimeout(() =>{
            location.reload();
        }, 9);
    }
}
form.onsubmit = (e)=>{
    e.preventDefault();
}

// if clicked on btn it send form to php 
shortenBTN.onclick = () =>{
    // console.log("erer");
    let xhr = new XMLHttpRequest(); //new obj

         // "method",      "url" ,    async? 
    xhr.open("POST", "url_control.php", true);

    // and handle response here with callback function
    xhr.onload = () =>{
        //4 means AJAX call has completed.
        if(xhr.readyState ==4 && xhr.status == 200){ //200 ajax request is ok!
            let data = xhr.response;
            console.log(data);

            if(data.length <=5 && data.length > 0){
                    blur_effect.style.display ="block";
                    // popup_box.style.display ="block";
                    popup_box.classList.add("show");

                    short_url.value =  `localhost/shorten_link/${data}`;
                    copyBTN.onclick = () =>{
                        short_url.select();
                        navigator.clipboard.writeText(short_url.value);
                        copyBTN.style.opacity= "0";
                        doma.innerText="copied!";
                        doma.style.fontSize = "10px";

                    save_btn.onclick = () =>{
                        popup_form.onsubmit = (e)=>{
                            e.preventDefault();
                            }
                        console.log("ere");
                        location.reload();
                        }
                    }
            }else{
                alert(data);
            }
        }
    }
    let form_data = new FormData(form); //create new formdata obj
    xhr.send(form_data); //and send it to php
}