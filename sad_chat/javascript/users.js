const search_bar = document.querySelector(".users .search input"),
searchBTN = document.querySelector(".users .search button"),
users_list = document.querySelector(".users .users_list");

searchBTN.onclick =() =>{
    search_bar.classList.toggle("active");
    // console.log("erer");
    search_bar.focus();
    searchBTN.classList.toggle("active");
    search_bar.value = "";
}
search_bar.onkeyup = () =>{
    let search_term = search_bar.value;
    if(search_term != ""){ // searching
        search_bar.classList.add("active");
    }else{
        search_bar.classList.remove("active");
    }

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/search.php", true);
    xhr.onload = () =>{
        if(xhr.readyState == 4 && xhr.status == 200){
            let data = xhr.response;
            console.log(data);
            users_list.innerHTML = data;

            }
        }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("search_term=" + search_term);
}

setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "php/users.php", true);
    xhr.onload = () =>{
        if(xhr.readyState == 4 && xhr.status == 200){
            let data = xhr.response;
            // console.log(data);
            if(!search_bar.classList.contains("active")){ // i can't run
            users_list.innerHTML = data;
            }
        }
    }
        xhr.send();
        // console.log("ere");
}, 500)
