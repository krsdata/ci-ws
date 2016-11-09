<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Front Panel</title>
    <base href="<?php echo base_url(); ?>" />
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-post.css" rel="stylesheet">
    <link href="css/star-rating.css" media="all" rel="stylesheet" type="text/css" />

   


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
    <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: #3498db;border: medium none;" role="navigation">
        <div class="container">
            <div class="navbar-header">
             
                <a class="logo" href="#">
                <img class="img-responsive" width="15%" src="<?php echo base_url().'img/logo_xxhdpi.png' ?>"></a>
            </div>
           <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               
            </div>
          </div>
        <!-- /.container -->
    </nav>

  

    <!-- Page Content -->
    <div class="container">

        <div class="row" style="margin-top: 25px;">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                 <div class="demo">

                 <div class="row">
                      <div class="col-xs-6 col-md-3">
                        <a href="#" class="thumbnail">
                         <img src="img/new-user-image-default.png" >
                        </a>
                      </div>
                      <div class="col-md-9">

                                <form class="form-horizontal" role="form">
                                      <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Wifi Name :</label>
                                        <div class="col-sm-9">
                                         <label class="control-label">CIS</label>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Wifi Address :</label>
                                        <div class="col-sm-9">
                                         <label class="control-label">Plasiya,Indore</label>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Wifi Active :</label>
                                        <div class="col-sm-9">
                                         <div id = "circle"></div>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                       <div class="col-sm-9">
                                       <input id="input-id" type="number" class="rating" min="1" max="5" step="1" data-size="xs" data-rtl="false" data-show-clear="false" data-show-caption="false">
                                       </div>
                                      </div>
                                                          
                             
                            </form>
                            
                      </div>
 
                </div>


                      
                    
                 </div>

                  <div class="demo">

                 <div class="row">
                      <div class="col-xs-6 col-md-3">
                        <a href="#" class="thumbnail">
                         <img src="img/new-user-image-default.png" >
                        </a>
                      </div>
                      <div class="col-md-9">

                                <form class="form-horizontal" role="form">
                                      <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Wifi Name :</label>
                                        <div class="col-sm-9">
                                         <label class="control-label">CIS</label>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Wifi Address :</label>
                                        <div class="col-sm-9">
                                         <label class="control-label">Plasiya,Indore</label>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Wifi Active :</label>
                                        <div class="col-sm-9">
                                         <div id = "circle"></div>
                                        </div>
                                      </div>
                                                          
                             
                            </form>

                      </div>
 
                </div>


                      
                    
                 </div>


                             

            </div>



            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

             <div class="demo">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

               
            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
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
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
 <script src="js/star-rating.js" type="text/javascript"></script>
<script type="text/javascript">
    
   $("#input-id").rating();
</script>

</body>

</html>
