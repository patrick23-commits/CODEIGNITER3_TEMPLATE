<main>
    <div id="navigator" class="">
        <section id="nav-name">
            <a href="#">Simple CRUD System</a>
        </section>
        <section id="nav-btns">
            <button data-tab="home" class="btn_tab" id="btn_home">Home</button>
            <button data-tab="data" class="btn_tab" onclick="load_data()" id="btn_data">Data</button>
            <button data-tab="register" class="btn_tab" id="btn_reg">Register</button>
            <button data-tab="login" class="btn_tab" id="btn_login">Login</button>
        </section>
    </div>
    <div id="home" class="tab ">
        <div class="card p-5 m-3 shadow-lg ">
            <h1>WELCOME!!</h1>
        </div>
    </div>
    <div id="data" class="tab hide">
        <div class="card m-3 shadow-lg ">
            <table id="tbl-accounts" class="table display"></table>
        </div>
    </div>
    <div id="login" class="tab hide">
        <div class="card p-5 shadow-lg m-3">
            <form method="post" id="login-form">
                <span>
                    <h1>Login</h1>
                </span>
                <div class="form-group">
                    <!-- <label for="username">Username</label> -->
                    <input class="form-control" type="text" name="username" placeholder="Username" id="username" required>
                </div>
                <br>
                <div class="form-group">
                    <!-- <label for="password">Password</label> -->
                    <input class="form-control" type="text" name="password" placeholder="Password" id="password" required>
                </div>
                <br>
                <span>
                    <button class="btn btn-primary" type="submit" id="btn-log">Login</button>
                </span>
            </form>
        </div>
    </div>
    <div id="register" class="tab hide">
        <div class="card p-5 shadow-lg m-3"> 
            <form action="login/register" method="post" class="reg-form">
                <span>
                    <h1>Register</h1>
                </span>
                <span>
                    <!-- <label for="firstname">Firstname</label> -->
                    <input class="form-control" type="text" name="firstname" id="firstname" placeholder="Firstname" required>
                </span>
                <span>
                    <!-- <label for="middlename">Middlename</label> -->
                    <input class="form-control" type="text" name="middlename" id="middlename" placeholder="Middlename" required>
                </span>
                <span>
                    <!-- <label for="lastname">Lastname</label> -->
                    <input class="form-control" type="text" name="lastname" id="lastname" placeholder="Lastname" required>
                </span>
                <span>
                    <!-- <label for="username">Username</label> -->
                    <input class="form-control" type="text" name="username" id="uname" placeholder="Username" required>
                </span>
                <span>
                    <!-- <label for="password">Password</label> -->
                    <input class="form-control" type="password" name="password" id="pass" placeholder="Password" required>
                </span>
                <span>
                    <button class="btn btn-primary" type="submit" id="btn-reg">Register</button>
                </span>
            </form>
        </div>
    </div>
</main>

<div id = "modal" class="hide">
    <div id = modal-holder class="card p-3 shadow-lg m-3">
    <section id = "modal-header">
        <span id = "modal-title">
            <p id="login-title" class="hide">YOUR INFORMATION</p>
            <p id="delete-title" class="hide">Delete item</p>
        </span>
        <span id = "modal-close">
            <button id = "btn-modal-close" onclick="modal_close()">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </span>
    </section>
    <section id = "modal-body">
        <div id="login-info" class="hide">
            <input id = "id_id" type="hidden" value="">
            <input id = "id_firstname" type="text" placeholder="First Name" class="form-control" disabled>
            <input id = "id_middlename" type="text" placeholder="Middle Name" class="form-control" disabled>
            <input id = "id_lastname" type="text" placeholder="Last Name" class="form-control" disabled>
            <input id = "id_nickname" type="text" placeholder="Nickname" class="form-control" disabled>
            <input id = "id_age" type="text" placeholder="Age" class="form-control" disabled>
            <input id = "id_gender" type="text" placeholder="Gender" class="form-control" disabled>
            <input id = "id_address" type="text" placeholder="Address" class="form-control" disabled>
            <input id = "id_num" type="text" placeholder="Contact Number" class="form-control" disabled>
            <input id = "id_bday" type="date" placeholder="Birthday" class="form-control" disabled>
        </div>

        <div id="delete-confirmation" class="hide">
            <span>Message</span>
        </div>

    </section>
    <section id = "modal-action">
        <button class="btn btn-secondary" onclick="modal_close()">
            CANCEL
        </button>
        <button id = "btn-edit-user" class="btn btn-primary hide" onclick="edit_user()">
            EDIT
        </button>
        <button id = "btn-save-user" class="btn btn-success hide" onclick="save_user()">
            SAVE
        </button>

        <button id="btn-del-user"  class="btn btn-warning hide">
            DELETE    
        </button>
    </section>
    </div>   
</div>