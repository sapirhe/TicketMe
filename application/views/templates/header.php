
<html>
<head>
   	<title><?php echo $title; ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css"/>
         <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

         
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav center nav-top nav_lines">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url(); ?>/Shows_controller/HomePage"><b>דף הבית</b></a>
                        </li>
                        <li class="nav-item" id="shows">
                            <a class="nav-link" href="<?php echo site_url(); ?>/Shows_controller/Shows"><b>מאגר ההופעות</b></a>
                        </li>
                        <li class="nav-item" id="personalErea">
                            <a class="nav-link" href="<?php echo site_url(); ?>/Shows_controller/personalArea"><b>איזור אישי</b></a>
                        </li>
                        <li class="nav-item" id="management">
                            <?php if(isset($_SESSION['user'][0]['management'])!=null){ echo '<a class="nav-link" href='. site_url().'/Management_controller/management><b> ניהול</b></a>';}?>
                        </li>
                        <li class="nav-item" id="register">
                            <a class="nav-link" href="<?php echo site_url(); ?>/Login_controller/register"><b>הרשמה</b></a>
                        </li>
                        <li class="nav-item" id="logout">
                            <a class="nav-link" href="<?php echo site_url(); ?>/Login_controller/logout"><b>התנתקות</b></a>
                </li>
                    </ul>
                </div>
            </nav>
</header>

 <script>
    <?php $userCheck=isset($_SESSION['user']);
           if($userCheck==null){
               $val=0;
           }
           else{
               $val=1;
           }
    ?>
    var user = "<?=$val?>";
    user=parseInt(user);
    
   if (user===0){
       document.getElementById('personalErea').style.display= 'none'; 
       document.getElementById('logout').style.display= 'none';
       document.getElementById('shows').style.display= 'none';
   }
   else{
       document.getElementById('personalErea').style.display= 'inline-block'; 
       document.getElementById('logout').style.display= 'inline-block';
       document.getElementById('register').style.display= 'none';
       document.getElementById('shows').style.display= 'inline-block';
   }
</script>
