<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Front Panel</title>

   
    <base href="<?php echo base_url(); ?>" />

    <!-- <link href="css/bootstrap.min.css" rel="stylesheet">


    <link href="css/blog-post.css" rel="stylesheet">

 -->

    <script src="js/jquery-1.11.1.min.js"></script>

   <!--  // <script src="js/common.js"></script>
    // <script src="js/bootstrap.min.js"></script> -->
   

    
  <!--   // <script src="js/bootstrap-table.js"></script> -->
    <style type="text/css">
       footer {
            background: none repeat scroll 0 0 #000;
            bottom: 0;
            font-size: 12px;
            font-weight: 300;
           
            position: fixed;
            text-align: center;
            width: 100%;
        }
        
        .boxclass
        {
          text-align: center;
             
        }

        #content > img {
            
            height: 100%;
            width: 100%;
            position: relative;;
            top: 0px;

        }
        .header
        { 
            background:#e16673; padding:10px 0px 10px 20px; 
        }

        .logo
        { 
            display:inline-block; vertical-align:middle; width:50%;
        }

        .logo img, .logo span
        { 
            display:inline-block; vertical-align:middle;
        }

        .logo img
        { 
            max-width:30px; margin-right:10px;
        }

        .logo a
        { 
            color:#fff; text-transform:uppercase; font-weight:700; font-size:17px;
        }
        body
        {
            margin: 0 auto;
            overflow: hidden;
        }
    </style>
    
</head>
<body >
 <!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-MGVT9X"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MGVT9X');</script>
<!-- End Google Tag Manager -->

    <div>

        <!-- <div id ="navid"  class="header">
            <div class="logo"><a href="#"><img src="<?php //echo base_url().'img/logo_xxhdpi.png' ?>" alt="" /><span>FREE AS AIR</span></a></div>
        </div> -->

        
      <!--  <nav id ="navid" class="navbar navbar-inverse" style="background-color: #e16673;border: medium none;" role="navigation">
        <div class="container">
            <div class="navbar-header">
             
                <a class="logo" href="#">
                <img class="img-responsive" width="100px" src="<?php //echo base_url().'img/logo_xxhdpi.png' ?>"></a>
            </div>
           <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               
            </div>
          </div>

        </nav>
 -->

        <div id="content" class="boxclass">
  

        <?php
               
          echo $content;
      
        ?>

        </div>
       

        

     
        <!-- <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p align="center" style="color:white;margin-top:5%;"><b>Copyright &copy; 2015 Free as air</b></p>
                </div>
            </div>
      
        </footer> -->

    </div>

    <script type="text/javascript">
 
    
     $(document).ready(function(){
            content_height();
    });

    $(window).resize(function(){
        //content_height();
    });

    function content_height() {
        var windw_hght = $(window).height();
       // var nav_hght = $('#navid').height();
        //var main_hght = windw_hght - nav_hght - $('footer').height()-12;
        $('#content').css('height', windw_hght);
        //var topVal =($(window).height() - $('div>img').height())/2;

       // $('div>img').css('top',topVal)
       // $('#test').html(main_hght);


    };

    </script>
    <!-- jQuery -->


  

</body>

</html>
