<main>
    <div class="col-md-8 description" id="welcomeMsg">
        <h3 id="welcome">    ברוכים הבאים ל- TicketMe</h3>
        <h5>הכרטיס שלך לכל הופעה</h5>
        <p>באתרנו תוכלו למצוא כרטיסים לכל ההופעות החמות במחירים אטרקטיביים ובהתאם להעדפותיכם האישיות<br> הרשמו עכשיו ותתחילו להנות! </p>
         <div><a href="<?php echo site_url(); ?>/Shows_controller/Artists_search_api" id="submit" class="link" type="button"> רוצה לזכור את כל השירים בעל פה לפני ההופעה? הכנס/י עכשיו לספריית המוזיקה שלנו</a></div>

    </div>
    
    <div id="login_cube" class="col-md-3 log_in">
        <p id="error"><?php if (isset($error)){echo $error['message'];}?></p>
        <?php echo form_open('Login_controller/auth'); ?>
        <fieldset>
        <legend>התחבר כאן</legend>
        <div class="inputWrapper"><input class="formInput" placeholder="שם משתמש" type="text" name="user"></div>
        <div class="inputWrapper"><input class="formInput" placeholder="סיסמה" type="password" name="password"></div>
        <div class="inputWrapper"><input id="submit" type="submit" value="התחבר" name="submit">
        <p class="plogin">אין לך חשבון? </p>
        <a class="alogin" href="<?php echo site_url(); ?>/Login_controller/register">הירשם כאן</a>   
        </fieldset>
    </div>
        
    <div id="benefit_cube" class="col-md-3 log_in">
        <br><h4><b>ההטבות שלי</b></h4><br>
        <?php
            if($benefit==false)
            {
                echo "אין הטבות זמינות<br>";
                echo "<img style='width:165px; height: 130px;' src='". base_url()."assets/images/nobenefit.jpg'>";
            }
            else
            {
                echo "<h5 id='birthday'>מזל טוב! </h5>";
                echo "הנך זכאי להטבת יום הולדת <br> צור קשר עם משרדנו למימוש ההטבה";
                echo "<img style='width:165px; height: 130px;' src='". base_url()."assets/images/cakebirthday.jpg'>";
            }
        
        
        ?>
    </div>
        
    <div class="description" id="recommendedShows">
        <br><h3>מומלץ עבורך</h3><br>
        <?php
            foreach($recommendedShows as $recShow){ ?>
                <div class="showArea"> 
                    <div class="showBox">
                        <?php echo '<img class="showImg" src="data:image/jpeg;base64,'.base64_encode( $recShow['img'] ).'"/>'; ?>
                        <div class="showText">
                        <?php
                            $time=$recShow['time'];
                            $time=substr($time,0,5);
                            echo '<h3>'.$recShow['artist_name'].'</h3><br>';
                            echo '<p>'.date('d-m-Y', strtotime($recShow['date'])).'</p>';
                            echo '<p>'.$time.'</p>';
                            echo '<p>'.$recShow['hall_name'].'</p>';
                            echo '<p>'.$recShow['price'].' ש"ח'.'</p>';
                        ?>
                        </div>
                    </div>
                    <p class="purchase"><a href="<?php echo site_url(); ?>/Shows_controller/purchase?show_id=<?php echo $recShow['show_id']?>"  class="link" type="button"> מעבר לרכישה</a></p>
                    
                </div>
            <?php } ?>
    </div>
    <div class="description" id="hotShows">
        <br><h3>הופעות חמות</h3><br>
        <?php
            foreach($hotShows as $row){ ?>
                <div class="showArea"> 
                    <div class="showBox">
                        <?php echo '<img class="showImg" src="data:image/jpeg;base64,'.base64_encode( $row['img'] ).'"/>'; ?>
                        <div class="showText">
                        <?php
                            $time=$row['time'];
                            $time=substr($time,0,5);
                            echo '<h3>'.$row['artist_name'].'</h3><br>';
                            echo '<p>'.date('d-m-Y', strtotime($row['date'])).'</p>';
                            echo '<p>'.$time.'</p>';
                            echo '<p>'.$row['hall_name'].'</p>';
                            echo '<p>'.$row['price'].' ש"ח'.'</p>';
                        ?>
                        </div>
                    </div>
                    
    <?php if(isset($_SESSION['user'][0])!=null){ echo '<p class="purchase"><a href="'.site_url().'/Shows_controller/purchase?show_id='.$row['show_id'].'" class="link" type="button"> מעבר לרכישה</a></p>';} ?>                </div>
            <?php } ?>
    </div>    
       
   




</main>

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
       document.getElementById('login_cube').style.display= 'inline-block'; 
       document.getElementById('recommendedShows').style.display= 'none'; 
       document.getElementById('benefit_cube').style.display= 'none'; 
   }
   else{
       document.getElementById('login_cube').style.display= 'none';
       document.getElementById('recommendedShows').style.display= 'block';
       document.getElementByClass('purchase').style.display= 'inline-block';
       document.getElementById('benefit_cube').style.display= 'inline-block'; 
   }
   
</script>

