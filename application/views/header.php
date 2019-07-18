<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Restaurant</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/fonts/ionicons.min.css')?>">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/styles.css">

    <?php if($this->session->userdata('message')==True) :?>
        <script>alert("<?php echo $this->session->userdata('message'); ?>")</script>
        <?php $this->session->unset_userdata('message'); ?>   
    <?php endif ?>
</head>

<body>
    <div>
        <nav class="navbar navbar-light navbar-expand-md navigation-clean" style="background-color:rgb(115,14,132);color:rgb(244,240,240);">
            <div class="container"><a class="navbar-brand" href="#">Online Restaurant</a>
                <div class="collapse navbar-collapse"
                    id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link " href="<?php echo base_url(); ?>" style="color:rgb(255,255,255);">Home</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link " href="<?php echo base_url(); ?>" style="color:rgb(255,255,255);">Menu</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link " href="<?php echo base_url() ?>login" style="color:rgb(255,255,255);">Admin Login</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link " href="<?php echo base_url() ?>Customer/viewCart" style="color:rgb(255,255,255);">Cart(<?php echo $cartCount; ?>)</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link " href="<?php echo base_url(); ?>Customer/trackOrder" style="color:rgb(255,255,255);">Track Order</a></li>
                        
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container" align="center" style="margin-top:50px;min-height:400px"> 
        <div class="col-md-12"> 
            