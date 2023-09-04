<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
</head>
<body>
   <table class="table display"> 
    <thead>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Gender</th>
        <th>Address</th>
        <th>Age</th>
        <th>Action</th>
    </thead>
    <tbody>
        <?php foreach($allusers as $key => $user) :?>
        <tr>
            <td><?= $user['fname']?></td>
            <td><?= $user['lname']?></td>
            <td><?= $user['gender']?></td>
            <td><?= $user['address']?></td>
            <td><?= $user['age']?></td>
            <td>
                <button data-id="<?= $user['id']?>" class="btn-primary edit_user">edit</button>
                <button class="btn-primary">delete</button>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
   </table>
    
   <script>
    $('table').DataTable()
    $('.edit_user').on('click',function(){
        var user_id = window.sessionStorage.getItem('id');
        if(user_id) {
            var id = $(this).data('id');
            alert('for edit '+ id)
        } else {
            location.href = "alliah";
        }
        
    })

   </script>
</body>
</html>