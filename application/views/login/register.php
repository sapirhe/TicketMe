<main>
    <div class="reg_form_border center">
        <p id="error"></p>
        <?php echo form_open('Login_controller/registerNotes'); ?>
        <fieldset class="center">
            <legend>הרשמה</legend>
            <div class="inputWrapper"><input class="formInput" placeholder="שם פרטי" type="text" id="first_name" name="first_name" required></div>
             <div class="inputWrapper"><input class="formInput" placeholder="שם משפחה" type="text" id="last_name" name="last_name" required></div>
             <div class="inputWrapper"><input class="formInput" placeholder="טלפון" type="tel" id="phone" name="phone" required></div>
             <div class="inputWrapper"><input class="formInput" placeholder="E-mail" type="email" id="email" name="email" required></div>
             <div class="inputWrapper"><input class="formInput" placeholder="שם משתמש" type="text" id="user" name="user" required></div>
             <div class="inputWrapper"><input class="formInput" placeholder="סיסמה" type="password" id="password" name="password" maxlength="8" onkeyup="check()" required></div>
             <div class="inputWrapper"><input class="formInput" placeholder="אימות סיסמה" type="password" id="passwordConf" name="passwordConf" maxlength="8" onkeyup="check()" required><span id='message'></span></div>
             <div class="inputWrapper"><input class="formInput" placeholder="עיר" type="text" id="city" name="city" required></div>
             <div class="inputWrapper"><lable>תאריך לידה:</lable><br><input class="formInput" placeholder="תאריך לידה" type="date" id="date_of_birth" name="date_of_birth" required></div>
             <div class="inputWrapper"><input id="reg" type="button" value="הירשם" name="submit" ></div>
        </fieldset>
        <?php echo form_close(); ?>
    </div>
</main>

<script>
    var check = function() {
        if (document.getElementById('password').value ==
          document.getElementById('passwordConf').value) {
          document.getElementById('message').style.color = 'green';
          document.getElementById('message').innerHTML = 'סיסמה תואמת';
        } else {
          document.getElementById('message').style.color = 'red';
          document.getElementById('message').innerHTML = 'סיסמה לא תואמת';
        }
      }
    
          $("#reg").click(function (){
                
                var first_name = $("#first_name").val();
                var last_name = $("#last_name").val();
                var phone = $("#phone").val();
                var email = $("#email").val();
		var user = $("#user").val();
       		var password = $("#password").val();
                var passwordConf = $("#passwordConf").val();
                var city = $("#city").val();
                var date_of_birth =$ ("#date_of_birth").val();
                
                $.ajax({
                type: 'POST',
                url: "<?php echo site_url(); ?>"+"/Login_controller/registerNotes",
                data: {first_name: first_name, last_name: last_name, phone: phone, email: email,
                user: user, password: password, passwordConf: passwordConf, city: city, date_of_birth: date_of_birth},
                error: function() {
                    alert('Something is wrong');
                },
                success: function(data) {
                    if(data==="1"){
                        alert("ההרשמה בוצעה בהצלחה, ברוכים הבאים!");
                        window.location.href="<?php echo site_url('Shows_controller/HomePage');?>";
                    }
                    else{
                         $("#error").html(data);
                    }
                    
                }
                
        });
        
     });
</script>
                        