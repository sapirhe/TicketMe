<section>
    <div class="reg_form_border container">
        <p id="error"><?php if ($infoHall!=NULL){echo $infoHall['message'];}?></p>
        <?php echo form_open('Management_controller/addHallNotes'); ?>
        <fieldset class="center">
            <legend>הוספת אולם למאגר</legend>
             <div class="inputWrapper"><input class="formInput" placeholder="שם האולם" type="text" name="hall_name"></div>
             <div class="inputWrapper"><input class="formInput" placeholder="כתובת" type="text" name="address"></div>
            <div><lable>אזור: </lable><br><select name="area" size="1">
                        <option value="מרכז"> מרכז</option>
                        <option value="צפון"> צפון</option>
                        <option value="דרום"> דרום</option>    
                        </select></div>
             <div class="inputWrapper"><input id="submit" type="submit" value="שלח" name="submit"></div>
        </fieldset>
        
        <div class="inputWrapper center" id="btnHall"><input id="submit" type="button" value="הצג את רשימת האולמות" name="submit" style="background-color: #8FBC8F;"></div>
          <div id="hallTable">  
            <table class="table container">
                        <thead>
                            <tr>
                                <th scope="col">שם האולם</th>
                                <th scope="col">כתובת</th>
                                <th scope="col">אזור</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($hallInfo as $hall){ ?>
                            <tr>
                                <th scope="row"><?php echo $hall['hall_name']; ?></th>
                                <td><?php echo $hall['address']; ?></td>
                                <td><?php echo $hall['area']; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
              </table>
        </div>
    </div>
        
 
    <script>
        $(document).ready(function(){
            $("#btnHall").click(function(){
              $("#hallTable").toggle();
  });
});
    </script>
    </div>
    


</form>
    
</section>
