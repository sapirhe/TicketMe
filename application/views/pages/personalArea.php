<main>
    <div class="description">
        <br><h1>איזור אישי</h1><br>
        <hr class="line">
        <form>
            <fieldset class="container">
            <h3>הפרטים  שלי</h3><br>
            <div class="col-md-6">
            <label class="labPA" for="customer_number"> מספר לקוח</label>
            <input class="inputPA" type="text" name="customer_number" id="customer_number" value="<?php echo $user['user'][0]['customer_number'] ?>" readonly><br>                
            <label class="labPA" for="first_name"> שם פרטי</label>
            <input class="inputPA" type="text" name="first_name" id="first_name" value="<?php echo $user['user'][0]['first_name'] ?>" readonly><br>
            <label class="labPA" for="last_name"> שם משפחה</label>
            <input class="inputPA" type="text" name="last_name" id="last_name" value="<?php echo $user['user'][0]['last_name'] ?>" readonly><br>        
            <label class="labPA" for="phone"> מספר טלפון</label>
            <input class="inputPA" type="text" name="phone" id="phone" value="<?php echo $user['user'][0]['phone'] ?>" readonly><br>  
            </div>
            <div class="col-md-6">
            <label class="labPA" for="email"> Email</label>
            <input class="inputPA" type="text" name="email" id="email" value="<?php echo $user['user'][0]['email'] ?>" readonly><br>                
            <label class="labPA" for="user"> שם משתמש</label>
            <input class="inputPA" type="text" name="user" id="user" value="<?php echo $user['user'][0]['user'] ?>" readonly><br>
            <label class="labPA" for="city"> עיר</label>
            <input class="inputPA" type="text" name="city" id="city" value="<?php echo $user['user'][0]['city'] ?>" readonly><br>        
            <label class="labPA" for="date_of_birth"> תאריך לידה</label>
            <input class="inputPA" type="text" name="date_of_birth" id="date_of_birth" value="<?php echo $user['user'][0]['date_of_birth'] ?>" readonly><br>  
            </div>
            </fieldset>
        </form>
        <hr class="line">
        <br><h3>הרכישות שלי</h3><br>
        <label class="labPA" id="labPurchase" for="sumOfPurchases"> סך הרכישות שלי</label>
        <input type="text" name="sumOfPurchases" class="inputPA" id="labPurchase" value='<?php echo $sumOfPurchases[0]['SUM(price)'].' ש"ח'?>' readonly><br>
        <table class="table container">
                    <thead>
                        <tr>
                            <th scope="col">#הזמנה</th>
                            <th scope="col">שם האומן</th>
                            <th scope="col">מיקום</th>
                            <th scope="col">תאריך</th>
                            <th scope="col">שעה</th>
                            <th scope="col">מחיר</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($earlierShows as $show){ 
                        $time=$show['time'];
                        $time=substr($time,0,5);
                        ?>
                        <tr>
                            <th scope="row"><?php echo $show['invitantion_number']; ?></th>
                            <td><?php echo $show['artist_name']; ?></td>
                            <td><?php echo $show['hall_name']; ?></td>
                            <td><?php echo date('d-m-Y', strtotime($show['date'])); ?></td>
                            <td><?php echo $time; ?></td>
                            <td><?php echo $show['price'].' ש"ח'; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
         <hr class="line">
    </div>
</main>
