<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>CI-TB-Base</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le styles -->
    <link href="<?php echo base_url('assets/css/bootstrap/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap/bootstrap-responsive.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/site-custom.css'); ?>" rel="stylesheet">

    <script src="<?php echo base_url('assets/js/libs/jquery-1.7.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/libs/bootstrap/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/libs/validator/jquery.validate.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/application.js'); ?>"></script>

    <style>
      
    </style>

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo base_url('assets/ico/favicon.ico'); ?>">
    <link rel="apple-touch-icon" href="<?php echo base_url('assets/ico/apple-touch-icon.png'); ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url('assets/ico/apple-touch-icon-72x72.png'); ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url('assets/ico/apple-touch-icon-114x114.png'); ?>">
  </head>

  <body >

    <div id="main-container" >

      <!-- Load Header -->
      <?php echo $this->load->view('global/header'); ?>
      <!-- END OF Load Header -->

      <div id="main" class="container" >

        <?php echo $this->load->view($content); ?>

      </div> <!-- END OF #main .container -->  
      <div class="push"></div> 
      <!-- END OF .push -->
    </div> <!-- END OF #main-container -->

    <!-- Load Footer -->
    <?php echo $this->load->view('global/footer'); ?>
    <!-- Load Footer -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->


    <!-- Analytics
    ================================================== -->
    <script type="text/javascript">
  
      $(function(){
        $.ajaxSetup ({
            // Disable caching of AJAX responses
            cache: false
        });
        
        //$('#slider').nivoSlider();

      });

    </script>
  </body>
</html>
