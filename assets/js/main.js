const holder = document.querySelector("#holder");

function addNotif(title, msg, flg="b"){
    let color = "black";
    if(flg == "g")
        color = "#2ECC71";
    else if(flg=="r"){
        color = "#E74C3C";
    } 

    const notif = document.createElement("div");
    notif.setAttribute("class", "notif card shadow-lg p-3 fade-out m-2");
    notif.addEventListener("animationend", ()=>{
        notif.remove();
    })
    
    const notif_title = document.createElement("div");
    notif_title.setAttribute("class", "notif-title");
    notif_title.innerHTML = title;
    notif_title.style.color = color;

    const notif_body = document.createElement("div");
    notif_body.setAttribute("class", "notif-body");
    notif_body.innerHTML = msg;

    notif.appendChild(notif_title);
    notif.appendChild(notif_body);

    holder.appendChild(notif);
}







