<main>
    <div class="container">
        <div class="description">
            <h1 class="showName"><?php echo $showInfo[0]['artist_name']." ב".$showInfo[0]['hall_name']; ?></h1>
            <div class="col-md-4 showInfo">
                <p><b>תאריך:</b> <?php echo date('d-m-Y', strtotime($showInfo[0]['date'])) ?></p>
                <p><b>שעה:</b> <?php echo substr( $showInfo[0]['time'],0,5 )?></p>
                <p><b>מחיר:</b> <?php echo $showInfo[0]['price'].' ש"ח' ?></p>
                <p><b>כתובת:</b> <?php echo $showInfo[0]['address'] ?></p>

            </div>
            <div class="col-md-6">
                <?php echo '<img class="showImg" src="data:image/jpeg;base64,'.base64_encode( $showInfo[0]['img'] ).'"/>'; ?>
                <br><br>
            </div>
            <div class="purchaseWrapper">
                <?php echo form_open('Shows_controller/savePurchase'); ?>
                <fieldset class="center">
                    <h2>רכישה</h2>
                    <label class="lab" for="price"> מספר מופע</label>
                    <input type="text" name="show_id" id="price" value="<?php echo $showInfo[0]['show_id'] ?>" readonly><br>
                    <label class="lab" for="show">שם המופע</label>
                    <input type="text" name="show_name" id="show" value="<?php echo $showInfo[0]['artist_name']." ב".$showInfo[0]['hall_name'] ?>" readonly><br>
                    <label class="lab" for="price"> מחיר</label>
                    <input type="price" name="price" id="price" value="<?php echo $showInfo[0]['price'] ?>" readonly><br>
                    <br><h3>תשלום</h3>
                                    <label for="fname">כרטיסים אפשריים לתשלום</label>
                                    <div class="icon-container">
                                        <i class="fa fa-cc-visa" style="color:navy;"></i>
                                        <i class="fa fa-cc-amex" style="color:blue;"></i>
                                        <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                        <i class="fa fa-cc-discover" style="color:orange;"></i>
                                    </div><br>
                                    <label for="user" class="lab">מספר לקוח</label>
                                    <input type="text" id="customer_number" name="customer_number" value="<?php echo $user['user'][0]['customer_number']; ?>" readonly><br>
                                    <label for="cname" class="lab">שם בעל הכרטיס</label>
                                    <input type="text" id="cname" name="cardname" placeholder="שלמה ארצי" required><br>
                                    <label class="lab" for="ccnum">מספר כרטיס אשראי</label>
                                    <input type="text" id="ccnum" name="cardnumber" placeholder="1111 2222 3333 4444" required>				  

                                    <div class="row">
                                        <div class="col-4">
                                            <br><label class="cardLab" for="expmonth">חודש </label>
                                            <select class="cardLab" name="expmonth" size="1"  required>
                                                <option value="01">ינואר</option>
                                                <option value="02">פברואר </option>
                                                <option value="03">מרץ</option>
                                                <option value="04">אפריל</option>
                                                <option value="05">מאי</option>
                                                <option value="06">יוני</option>
                                                <option value="07">יולי</option>
                                                <option value="08">אוגוסט</option>
                                                <option value="09">ספטמבר</option>
                                                <option value="10">אוקטובר</option>
                                                <option value="11">נובמבר</option>
                                                <option value="12">דצמבר</option>


                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <br><label class="cardLab" for="expyear" >שנה</label>
                                            <select class="cardLab" name="expyear" size="1" required>
                                                <option value="20"> 2020</option>
                                                <option value="21"> 2021</option>
                                                <option value="22"> 2022</option>
                                                <option value="23"> 2023</option>
                                                <option value="24"> 2024</option>
                                                <option value="25"> 2025</option>
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <br><label class="cardLab" for="cvv">CVV</label>
                                            <input class="cardLab" type="text" id="cvv" name="cvv" placeholder="352" required>
                                        </div>
                                    </div>
                    <input id="paySubmit" type="submit" value="בצע" name="submit">
                </fieldset>
            </div>
            
            
        </div>
    </div>
</main>
