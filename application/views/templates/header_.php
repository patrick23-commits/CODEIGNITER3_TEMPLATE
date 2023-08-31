<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=isset($title) ? $title : "DOCUMENT"?></title>

    <link rel="stylesheet" href="<?=base_url()?>css/main.css">
    <link rel="stylesheet" href="<?=base_url('assets/css/header.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/footer.css')?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <?php if(isset($css)) foreach($css as $c) { ?>
    <link rel="stylesheet" href="<?=base_url('assets/css/'.$c.'.css')?>">
    <?php }?>

    <?php if(isset($js)) foreach($js as $j) { ?>
    <script src="<?=base_url('assets/js/'.$j.'.js');?>"></script>
    <?php }?>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
</head>

<header>
    HEADER
</header>