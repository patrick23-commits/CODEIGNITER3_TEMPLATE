

<section>
    <nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Data</button>
        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Login</button>
        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">register</button>
    </div>
    </nav>

    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="card p-5 m-3 shadow-lg ">
                <table id="tbl-accounts" class="table display"> </table>
            </div>
        </div>

        <div class="tab-pane fade " id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="d-flex justify-content-center">
                <div class="card p-5 shadow-lg m-3" style="max-width:50%">
                    <form action="login/validate" method="post" id="login-form">
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
        
        </div>

        <div class="tab-pane fade d-flex justify-content-center" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            <div class="card p-5 shadow-lg m-3" style="max-width: 50%;"> 
                <form action="login/register" method="post" class="d-flex flex-column">
                    <span>
                        <h1>Register</h1>
                    </span>
                    <span>
                        <!-- <label for="firstname">Firstname</label> -->
                        <input class="m-1 form-control" type="text" name="firstname" id="firstname" placeholder="Firstname" required>
                    </span>
                    <span>
                        <!-- <label for="middlename">Middlename</label> -->
                        <input class="m-1 form-control" type="text" name="middlename" id="middlename" placeholder="Middlename" required>
                    </span>
                    <span>
                        <!-- <label for="lastname">Lastname</label> -->
                        <input class="m-1 form-control" type="text" name="lastname" id="lastname" placeholder="Lastname" required>
                    </span>
                    <span>
                        <!-- <label for="username">Username</label> -->
                        <input class="m-1 form-control" type="text" name="username" id="username" placeholder="Username" required>
                    </span>
                    <span>
                        <!-- <label for="password">Password</label> -->
                        <input class="m-1 form-control" type="password" name="password" id="password" placeholder="Password" required>
                    </span>
                    <span>
                        <button class="m-1 btn btn-primary" type="submit" id="btn-reg">Register</button>
                    </span>
                </form>
            </div>
        </div>
    </div>

</section>

<script>

    // $("#tbl-accounts").dataTable({
    //     data : {"data":{
    //             "1" : {"First Name":"fred","Middle Name":"g","Last Name":"landicho"},
    //             "2" : {"First Name":"shandy","Middle Name":"t","Last Name":"buena"}
    //         }
    //     }   
    //  });

    $("#tbl-accounts").dataTable({
        data : <?=$accounts;?>,
        columns : [
            {'data' : 'First Name'},
            {'data' : 'Middle Name'},
            {'data' : 'Last Name'}
        ],
        paging : false,
    });

    // $("#btn-log").on("click", function (e) {
    //     e.preventDefault();

    //     console.log(e);

    // });

    // const log = document.getElementById("btn-log");
    // log.addEventListener("click", (e)=>{ 
    //     e.preventDefault();
        

    //     const loginForm = document.getElementById("login-form");

    //     loginForm.style.backgroundColor = 'red';


    // });

    // const reg = document.getElementById("btn-reg");
    // reg.addEventListener("submit", (e)=>{
    //     e.preventDefault();
    // });

    



</script>

<style>
    main {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    main > form {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    main > form > span {
        display: flex;
        justify-content: space-between;
        gap: 10px;
    }

    main > form > span > h1 {
        width: 100%;
        text-align: center;
    }
</style>