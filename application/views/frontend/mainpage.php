<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Front Panel</title>
   
    <base href="<?php echo base_url(); ?>" />
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-post.css" rel="stylesheet">
    <link href="css/star-rating.css" media="all" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap-table.css">

    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/common.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/star-rating.js"></script>
    <script src="//maps.googleapis.com/maps/api/js?sensor=false" ></script>
    <script src="js/bootstrap-table.js"></script>
    
</head>
  
<body>
   <!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-MGVT9X"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MGVT9X');</script>
<!-- End Google Tag Manager -->

   <!-- Navigation -->
    

    <!-- Page Content navbar-fixed-top -->
    <div class="container">


       <nav id ="navid" class="navbar navbar-inverse" style="background-color: #3498db;border: medium none;" role="navigation">
        <div class="container">
            <div class="navbar-header">
             
                <a class="logo" href="#">
                <img class="img-responsive" width="100px" src="<?php echo base_url().'img/logo_xxhdpi.png' ?>"></a>
            </div>
           <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               
            </div>
          </div>
        <!-- /.container -->
        </nav>


        <div id="content">

        <?php
         

        if(strlen($content) > 30)
        {
          echo $content;
        }
        else
        {
         $this->load->view($content);

        }
          

        ?>

        </div>
        <!-- /.row -->

        <hr>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        </div>

        <!-- Footer -->
        <footer>
          <a id="inifiniteLoader">Loading... <img src="<?php echo base_url() ?>/img/loading.gif" /></a>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->



</body>

</html>
