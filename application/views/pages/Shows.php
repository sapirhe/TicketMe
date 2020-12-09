<main>
     <div class="col-md-2 tab">
                    <button class="tablinks active" onclick="openInfo(event, 'center')">מרכז</button>
                    <button class="tablinks" onclick="openInfo(event, 'north')">צפון</button>
                    <button class="tablinks" onclick="openInfo(event, 'south')">דרום</button>
                </div>

                <!-- Tab content -->
                <div id="center" class="col-md-9 tabcontent">
                    <h3 class="centerTitle">מרכז</h3>
                    <?php
                        foreach($center as $row){ ?>
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
                            <p class="purchase"><a href="<?php echo site_url(); ?>/Shows_controller/purchase?show_id=<?php echo $row['show_id']?>"  class="link" type="button"> מעבר לרכישה</a></p>
                    </div>
                       <?php } ?>
                </div>

                <div id="north" class="col-md-9 tabcontent">
                    <h3 class="centerTitle">צפון</h3>
                   <?php
                        foreach($north as $row){ ?>
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
                            <p class="purchase"><a href="<?php echo site_url(); ?>/Shows_controller/purchase?show_id=<?php echo $row['show_id']?>"  class="link" type="button"> מעבר לרכישה</a></p>
                    </div>
                       <?php } ?>
                </div>

                <div id="south" class="col-md-9 tabcontent">
                    <h3 class="centerTitle">דרום</h3>
                   <?php
                        foreach($south as $row){ ?>
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
                            <p class="purchase"><a href="<?php echo site_url(); ?>/Shows_controller/purchase?show_id=<?php echo $row['show_id']?>"  class="link" type="button"> מעבר לרכישה</a></p>
                    </div>
                       <?php } ?>
                </div>
</main>

<script>
    function openInfo(evt, tabName) {
    // Declare all variables
    var i, tabcontent, tablinks;


    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>