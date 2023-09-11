const fieldTAG = document.querySelector(".field input");
const previewTAG =document.querySelector(".preview_area");
const imgTAG = document.querySelector(".pre_img");
const hidden_inputTAG = document.querySelector(".hidden_input");
const btnTAG =document.querySelector("button");

fieldTAG.onkeyup = () =>{
    let img_url = fieldTAG.value;
    previewTAG.classList.add("active");
    btnTAG.style.pointerEvents = "auto";

        //at leaset first index
    if(img_url.indexOf("https://www.youtube.com/watch?v=") != -1){
// [0] https://www.youtube.com/watch?     v=      [1] PwnYfT1UbrA&t=2s
        let vid_id = img_url.split('v=')[1].substring(0,11);
        //https://img.youtube.com/vi/${vid_id}/maxresdefault.jpg
        imgTAG.src =`https://img.youtube.com/vi/${vid_id}/maxresdefault.jpg`; 
        console.log(imgTAG.src);

    }else if(img_url.indexOf("https://youtu.be/") != -1){
        let vid_id = img_url.split('be/')[1].substring(0,11);
        let IMG = `https://img.youtube.com/vi/${vid_id}/maxresdefault.jpg`;
        imgTAG.src =IMG ;
    }else if(img_url.match(/\.(jpe?g|png|gif|bmp|webp)$/i)){
        imgTAG.src =img_url;
    }else{
        imgTAG.src ="";
        btnTAG.style.pointerEvents = "none";
        previewTAG.classList.remove("acitve");
    }
    // console.log(imgTAG.src);
    hidden_inputTAG.value = imgTAG.src;
}