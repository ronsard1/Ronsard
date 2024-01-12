
<?php
include('config.php');
$result = mysqli_query( $con,"SELECT * FROM courses");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="landing.css">
    <title>Document</title>
</head>
<body>


<?php
   include('header.php');
   ?>
<div class="part1">
<div id="welcomeMessage">
    <?php
   if (isset($_SESSION['success'])) {
           echo('<p style="color:green">'.$_SESSION['success']." ". strtoupper($lname)."</p>");
    }
    ?>
</div>
  <h2 id="">Welcome  <?php echo strtoupper($lname)  ;?></h2>
  <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
     Consequatur accusantium recusandae consequuntur nihil facere, eligendi nisi. 
     Ipsam modi suscipit dignissimos laudantium eos,
     autem enim error deserunt sunt, fugit tempore dolores.</P>
     <div class="new" style="color:black"><center>New Courses:</center></div>  
 </div>
  <div class="box-cont" style="background:black; overflow-y:auto;  display: grid; grid-template-columns: repeat(auto-fit, minmax(270px, 1fr)); gap: 3px;
    background-color: black;">
   <div class="bo" style ="overflow-x: hidden"><img scr="logo.png">hello lorem ipsume thisns djdfhjegvyug4yatruawtvuircaeariaueyruilabwtytrcyaruiyaceuitruivauertcbytrbuivrtuicyruitaiutcruiiaycuriucuisrbubyvsubryubtruveuitrabvlutburyu</div>
   <div class="bo" style ="overflow-x: hidden">hello lorem ipsume thisns djdfhjegvyug4yatruawtvuircaearia</div>
   <div class="bo" style ="overflow-x: hidden">hello</div>
   <div class="bo" style ="overflow-x: hidden">hello</div>
   <div class="bo" style ="overflow-x: hidden">hello</div>
   <div class="bo" style ="overflow-x: hidden">hello</div>
   <div class="bo" style ="overflow-x: hidden">hello</div>
   <div class="bo" style ="overflow-x: hidden">hello</div>
   <div class="bo" style ="overflow-x: hidden">hello</div>
   <div class="bo" style ="overflow-x: hidden">hello</div>
   <div class="bo" style ="overflow-x: hidden">hello</div>
   <div class="bo" style ="overflow-x: hidden">hello</div>
   <div class="bo" style ="overflow-x: hidden">hello</div>


  </div>
    </div>
  


   <center> <div class="" style="color:black"> Help Center:</div><hr> 


   <?php
   include('footer.php');
   ?>
       </center>




       <script>
        const welcomeMessage = document.getElementById("welcomeMessage");
        setTimeout(() => {
                welcomeMessage.style.display = "none";
            }, 2000);
      </script>
</body>
</html>