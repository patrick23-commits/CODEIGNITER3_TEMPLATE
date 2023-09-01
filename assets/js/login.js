$(".btn_tab").on("click", function (e) {
    e.preventDefault();

    var tab = $(this).data("tab");
    $(".tab").addClass("hide");
    $("#"+tab).removeClass("hide");
})

load_data();


document.forms[0].addEventListener("submit", (e)=>{
    e.preventDefault();

    var login_form = new FormData();
    login_form.append("username", $("#username").val());
    login_form.append("password", $("#password").val());

   
    fetch("./login/validate", {
        method : "POST", 
        body : login_form
    })
    .then(resp=>resp.text())
    .then(data=>{
        if(JSON.parse(data).length > 0){
            const user = JSON.parse(data)[0];
    
    
            console.log(user);
            $("#id_id").val(user.id)
            $("#id_firstname").val(user.firstname)
            $("#id_middlename").val(user.middlename)
            $("#id_lastname").val(user.lastname)
            $("#id_nickname").val(user.nickname)
            $("#id_age").val(user.age)
            $("#id_gender").val(user.gender)
            $("#id_address").val(user.address)
            $("#id_num").val(user.num)

            const BDAY = new Date(user.bday);
            $("#id_bday").val(BDAY.getFullYear() + '-' + (("0" + (BDAY.getMonth() + 1)).slice(-2)) + '-' + (("0" + BDAY.getDate()).slice(-2)));
            modal_open("login"); 
        }else{
            addNotif("Login Failed", "User not found or deactivated", "r")
        }
    })
    .catch(err=>{
        console.log(err.code);
    })

})

document.forms[1].addEventListener("submit", (e)=>{

    
    e.preventDefault(); 

    let data = {
        firstname : $("#firstname").val(),
        lastname : $("#lastname").val(),
        middlename : $("#middlename").val(),
        username : $("#uname").val(),
        password : $("#pass").val()
    }

    console.log(data)
        

    fetch("./login/register", {
        method : "POST",
        headers : {
            "Content-Type" : "application/json" 
        },
        body : JSON.stringify(data)
    
    })
    .then(response=>response.text())
    .then(data=>{
        $("#firstname").val(""),
        $("#lastname").val(""),
        $("#middlename").val(""),
        $("#uname").val(""),
        $("#pass").val("")
        addNotif("Account Registered!", "Successfully added new account!", "g")
        load_data();
    })

    
})


function load_data() {
    fetch("./login/getallaccounts")
    .then(response=>response.text())
    .then(data=>{
        if( $("#tbl-accounts").html() != "") {
            $("#tbl-accounts").DataTable().clear().destroy()
        }
        $("#tbl-accounts").DataTable({
            data : JSON.parse(data),
            columns : [
                { title: 'First', 'data' : 'First Name'},
                { title: 'Middle','data' : 'Middle Name' },
                { title: 'Last Name', 'data' : 'Last Name'},
                { title: 'Action', 'data' : '0' },
            ],
            searching : false,
            paging : false,
        });
        document.querySelectorAll(".acc-text").forEach(el=>{
        el.addEventListener("keydown", (e)=>{
            if(e.key === "Enter") {
                save(el.id.split("_")[1])
            }
    })
})
        
    })
    
}

function save(id){
    document.getElementById("id-btn-save_" + id).classList.add("hide");
    document.getElementById("id-btn-edit_" + id).classList.remove("hide");
    
    const form = new FormData();
    form.append("id", id);
    form.append('firstname', document.getElementById("fname_"+id).value)
    form.append('middlename', document.getElementById("mname_"+id).value)
    form.append('lastname', document.getElementById("lname_"+id).value)

    fetch("./login/edit", {
        method : "POST",
        body : form

    }).then(result=>{
        console.log(result)
        document.getElementById("fname_"+id).disabled = true;
        document.getElementById("mname_"+id).disabled = true;
        document.getElementById("lname_"+id).disabled = true;
        addNotif("Account Updated!", "Successfully saved!", "g");
    })

    
}

function edit(id) {
    document.getElementById("id-btn-save_" + id).classList.remove("hide");
    document.getElementById("id-btn-edit_" + id).classList.add("hide");

    document.getElementById("fname_"+id).disabled = false;
    document.getElementById("mname_"+id).disabled = false;
    document.getElementById("lname_"+id).disabled = false;
}

function del(id) {
    modal_open("del")
    // const form = new FormData();
    // form.append("id", id);

    // fetch("./login/delete", {
    //     method : "POST",
    //     body : form

    // }).then(result=>{
    //     console.log(result)
    //     load_data()
    //     addNotif("Accout Deleted!", "Successfully deleted!", "g")
    // })
}

function modal_close() {
    $("#modal").addClass("hide");
}

function modal_open(flag) {
    if(flag == "login") {
        $("#login-info").removeClass("hide");
        $("#delete-confirmation").addClass("hide");

        $("#btn-edit-user").removeClass("hide");
        $("#btn-del-user").addClass("hide");

        disable_info_fields();
    } else if(flag == "del") {
        $("#login-info").addClass("hide");
        $("#delete-confirmation").removeClass("hide");

        $("#btn-del-user").removeClass("hide");
        $("#btn-edit-user").addClass("hide");        
    }
    

    $("#modal").removeClass("hide");
}

function edit_user(){
    $("#id_firstname").removeAttr("disabled")
    $("#id_middlename").removeAttr("disabled")
    $("#id_lastname").removeAttr("disabled")
    $("#id_nickname").removeAttr("disabled")
    $("#id_age").removeAttr("disabled")
    $("#id_gender").removeAttr("disabled")
    $("#id_address").removeAttr("disabled")
    $("#id_num").removeAttr("disabled")
    $("#id_bday").removeAttr("disabled")

    $("#btn-edit-user").addClass("hide");
    $("#btn-save-user").removeClass("hide");
}

function save_user(){
    disable_info_fields();

    const form = new FormData();
    form.append("id",$("#id_id").val())
    form.append("fname",$("#id_firstname").val())
    form.append("mname",$("#id_middlename").val())
    form.append("lname",$("#id_lastname").val())
    form.append("nn",$("#id_nickname").val())
    form.append("age",$("#id_age").val())
    form.append("g",$("#id_gender").val())
    form.append("addr",$("#id_address").val())
    form.append("num",$("#id_num").val())
    form.append("bday",$("#id_bday").val())
    fetch("./login/save_user", {
        method:"post",
        body:form
    }).then(()=>{
        addNotif("Account Updated!", "Successfully saved!", "g");
    })
}

function disable_info_fields(){
    $("#id_firstname").attr("disabled","disabled")
    $("#id_middlename").attr("disabled","disabled")
    $("#id_lastname").attr("disabled","disabled")
    $("#id_nickname").attr("disabled","disabled")
    $("#id_age").attr("disabled","disabled")
    $("#id_gender").attr("disabled","disabled")
    $("#id_address").attr("disabled","disabled")
    $("#id_num").attr("disabled","disabled")
    $("#id_bday").attr("disabled","disabled")

    $("#btn-edit-user").removeClass("hide");
    $("#btn-save-user").addClass("hide");
}