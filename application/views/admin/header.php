
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css">

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
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="#" style="color:rgb(255,255,255);">Home</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="<?php echo base_url() ?>admin/createProduct" style="color:rgb(255,255,255);">Add Products</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="<?php echo base_url() ?>admin/viewProducts" style="color:rgb(255,255,255);">View Products</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="<?php echo base_url() ?>admin/viewOrders" style="color:rgb(255,255,255);">View Orders</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="<?php echo base_url() ?>admin/viewSalesReport" style="color:rgb(255,255,255);">Sales Report</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="<?php echo base_url() ?>logout" style="color:rgb(255,255,255);">Logout</a></li>
                      
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container" style="min-height:400px;padding-top: 50px" align="center" > 
        <div class="row"> 
            <div class="col-md-12"> 