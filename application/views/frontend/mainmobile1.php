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
    <style type="text/css">
       footer {
            background: none repeat scroll 0 0 #000;
            bottom: 0;
            font-size: 12px;
            font-weight: 300;
            padding: 10px;
            position: fixed;
            text-align: center;
            width: 100%;
        }
         #navid img
         {
            height: 100px !important ;
         }

        #content iframe{
             position: relative;
             height: 100%;
             width: 100%; 
        }

        .boxclass
        {
          text-align: center;
    
        }

        #content > img {
  
     max-height: 85%;
    max-width: 98%;
    padding-top: 30px;
    vertical-align: middle;
}
    
    </style>
    
</head>

<body>
   <!-- Navigation -->
    

    <!-- Page Content navbar-fixed-top -->
    <div class="">

        
       <nav id ="navid" class="navbar navbar-inverse" style="background-color: #e16673;border: medium none;" role="navigation">
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


        <div id="content" class="boxclass">

        <?php
               
          echo $content;
      
        ?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p align="center" style="color:white;margin-top:5%;"><b>Copyright &copy; 2014 Free as air</b></p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->


   

</body>

</html>
