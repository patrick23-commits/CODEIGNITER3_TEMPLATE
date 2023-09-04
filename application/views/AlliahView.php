<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section class="d-flex justify-content-center p-5">
        <div class="card m-5 p-2">
            <h2> Login </h2>
                <form action="" method="post" id="login" >
                <div class="form-group m-2">
                    <input type="text" class="form-control" name="username" placeholder="Username">
                </div>
                <div class="form-group m-2">
                    <input type="text" class="form-control" name="password" placeholder="Password">
                </div>
                <center>
                <div class="form-group m-2">
                    <input class="btn btn-primary" style="width: 50%;align-content:center" name="alliah-login" value="Login" type="submit" id="btn-log">
                </div>
                </center>
            </form>
        </div>
        
    </section>
    <script>
        $(document).ready(function(){
            var base_url = '<?= base_url()?>'
            $('form').on('submit',function(e){
                e.preventDefault();
                var data = new FormData($('form')[0]);
                $.ajax({
                    url: base_url+ "alliah-login",
                    type: 'post',
                    data : data,
                    dataType: 'json',
                    processData:false,
                    contentType:false
                    }).done(function( msg ) {

                        if(msg.result == 1){
                            window.sessionStorage.setItem('id', msg.result);

                            location.href = 'main-view';
                        }
                        else{

                            alert(msg.result)
                        }
                       
                    });
}               )
            
        })
    </script>
</body>
</html>