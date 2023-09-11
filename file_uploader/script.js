const formTAG = document.querySelector("form");
const file_inputTAG = document.querySelector(".file_input");
const progressTAG = document.querySelector(".progress-area");
const uploadedTAG = document.querySelector(".uploaded-area");

formTAG.onclick = () =>{
    file_inputTAG.click();
};

file_inputTAG.onchange = ({target}) =>{

    // console.log(target.files[0]);
    let file = target.files[0];

    if(file){
        let file_name = file.name;
        if(file_name.length >= 12){
            // split_name[0] = file_name / split_name[1] = file_type 
            let split_name = file_name.split('.');
            // so only 12 name length with ... and .file_type
            file_name = split_name[0].substring(0,13) + "... ." + split_name[1];
        }
    // console.log(file_name)
        file_upload(file_name);
    }
}

file_upload = (name) =>{
    let xhr =new XMLHttpRequest();
    xhr.open("POST", "upload.php");
    // console.log(xhr);

    xhr.upload.addEventListener("progress", ({loaded, total}) =>{
        // loaded divided by total and x with 100 to get percent
        let file_loaded = Math.floor((loaded/ total) * 100);
        //to get file size KB from bytes;
        let file_total = Math.floor(total / 1000);
        let file_size;
        (file_size < 1024) ? file_size = file_total + "KB" : file_size = (loaded / (1024*1024)).toFixed(2) + "MB";
        let progress_html =`<li class="row">
                                  <i class="fas fa-file-alt"></i>
                                  <div class="content">
                                      <div class="details">
                                          <span class="name">${name} • Uploading</span>
                                          <span class="percent">${file_loaded}%</span>
                                      </div>
                                      <div class="progress-bar">
                                          <div class="progress" style="width: ${file_loaded}%"></div>
                                      </div>
                                  </div>
                            </li>`;
                // uploadedTAG.innerHTML= "";
                uploadedTAG.classList.add("onprogress");
                progressTAG.innerHTML= progress_html;
                if(loaded == total){
                    progressTAG.innerHTML ="";
                    let upload_html = `<li class="row">
                                          <div class="content upload">
                                              <i class="fas fa-file-alt"></i>
                                              <div class="details">
                                                    <span class="name">${name} • Uploaded</span>
                                                    <span class="size">${file_size}</span>
                                              </div>
                                          </div>
                                              <i class="fas fa-check"></i>
                                       </li>`;

                    uploadedTAG.classList.remove("onprogress");
                    uploadedTAG.insertAdjacentHTML("afterbegin", upload_html);
                }
    });
              let data = new FormData(formTAG);
              xhr.send(data);
}
