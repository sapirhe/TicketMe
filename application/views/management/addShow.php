<section>
    <div class="reg_form_border container">
        <p id="error"><?php if ($infoShow!=NULL){echo $infoShow['message'];}?></p>
        <?php 
        $attributes = array('name' => 'login_data');
        echo form_open_multipart('Management_controller/addShowNotes', $attributes);
        ?>
        <fieldset class="center">
            <legend>הוספת מופע למאגר</legend>
            <div><lable>שם האולם: </lable><br><select name="hall_name" size="1">
                <?php
                    foreach($halls_names as $key=>$value){
                        echo '<option value="'.$value['hall_name'].'">'. $value['hall_name'].'</option>';
                    }  
                ?>
                  </select>
            </div>
            <div class="inputWrapper"><input class="formInput" placeholder="שם האומן" type="text" name="artist_name" required></div>
            <div class="inputWrapper"><lable>תאריך: </lable><br><input class="formInput" type="date" name="date" required></div>
            <div class="inputWrapper"><lable>שעה: </lable><br><input class="formInput" type="time" name="time" required></div> 
            <div class="inputWrapper"><input class="formInput" placeholder="מחיר" type="text" name="price" required></div>
            <div class="inputWrapper"><input type="checkbox" id="hot_show" name="hot_show" value="1"><lable>הופעה חמה </lable></div>
            <div class="inputWrapper"><lable>העלאת תמונה(בפורמט JPEG ): </lable><input type="file" name="fileToUpload" id="fileToUpload" accept="images/*" enctype="multipart/form-data" required></div>
             <div class="inputWrapper"><input id="submit" type="submit" value="שלח" name="submit"></div>
        </fieldset>
        
         <div class="inputWrapper center" id="btnShow"><input id="submit" type="button" value="הצג את רשימת ההופעות" name="submit" style="background-color: #8FBC8F;"></div>
          <div id="showsTable">  
            <table class="table container">
                        <thead>
                            <tr>
                                <th scope="col">מספר הופעה</th>
                                <th scope="col">שם האולם</th>
                                <th scope="col">שם האומן</th>
                                <th scope="col">תאריך</th>
                                <th scope="col">שעה</th>
                                <th scope="col">מחיר</th>
                                <th scope="col">הופעה חמה</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($showsInfo as $show){ 
                            $time=$show['time'];
                            $time=substr($time,0,5);
                            ?>
                            <tr>
                                <th scope="row"><?php echo $show['show_id']; ?></th>
                                <td><?php echo $show['hall_name']; ?></td>
                                <td><?php echo $show['artist_name']; ?></td>
                                <td><?php echo date('d-m-Y', strtotime($show['date'])); ?></td>
                                <td><?php echo $time; ?></td>
                                <td><?php echo $show['price']; ?></td>
                                <td><?php if($show['hot_show']!=null){echo "כן";}else{ echo "לא";} ; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
              </table>
        </div>
    </div>
        
 
    <script>
        $(document).ready(function(){
            $("#btnShow").click(function(){
              $("#showsTable").toggle();
  });
  
});
    </script>
    


</form>
    
</section>

