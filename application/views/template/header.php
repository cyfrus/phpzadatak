<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP zadatak</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <?php
        $this->load->helper('html');
        echo link_tag('assets/font-awesome/css/font-awesome.css'); 
        echo link_tag('assets/style.css'); 
    ?>

    <div class="container-fluid main_container">
    <div class="row">
    <?php if(isset($user)) { ?>
        <div class="col-md-3   side_container">
            <h3><a href=<?php echo site_url('/'); ?> >PHP Zadatak</a></h3>
            <div>Username: <?php echo $user->username?></div>
            <div>Ime: <?php echo $user->ime?></div>
            <div>Prezime: <?php echo $user->prezime?></div>
            <div>Email: <?php echo $user->email?></div>
            <div>Rola: <?php echo $user->rola?></div>
            <div>
                <a href=<?php echo site_url('/'); ?> class="control_link">Artikli</a>
            </div>
           
            <?php if($user->rola === "admin") { ?>
             <div>
                <a href=<?php echo site_url('korisnik/all'); ?> class="control_link">Korisnici</a>
            </div>
            <div>
                <a href=<?php echo site_url('korisnik/add'); ?>  class="control_link">Dodaj korisnika</a>
            </div>

            <?php } ?> 
            <div>
                <a href=<?php echo site_url('artikal/add'); ?> class="control_link">Dodaj artikal</a>
            </div>
            <div>
                <a href=<?php echo site_url('logout'); ?> class="control_link">Logout</a>
            </div>
        </div>
            <?php } ?>
</head>
<body>
