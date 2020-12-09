  <section>
    <div class="reg_form_border container">
        <h4 id="title">הצגת המשתמשים</h4>
        
        <div class="inputWrapper center" id="btnCostumers"><input id="submit" type="button" value="הצג את רשימת המשתמשים" name="submit" style="background-color: #8FBC8F;"></div>
        
        <div id="usersTable">  
            <table class="table container">
                        <thead>
                            <tr>
                                <th scope="col">מספר לקוח</th>
                                <th scope="col">שם פרטי</th>
                                <th scope="col">שם משפחה</th>
                                <th scope="col">מספר טלפון</th>
                                <th scope="col">אימייל</th>
                                <th scope="col">שם משתמש</th>
                                <th scope="col">עיר</th>
                                <th scope="col">תאריך לידה</th>
                                <th scope="col">מנהל</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($costumersInfo as $customer){ ?>
                            <tr>
                                <th scope="row"><?php echo $customer['customer_number']; ?></th>
                                <td><?php echo $customer['first_name']; ?></td>
                                <td><?php echo $customer['last_name']; ?></td>
                                <td><?php echo $customer['phone']; ?></td>
                                <td><?php echo $customer['email']; ?></td>
                                <td><?php echo $customer['user']; ?></td>
                                <td><?php echo $customer['city']; ?></td>
                                <td><?php echo date('d-m-Y', strtotime($customer['date_of_birth'])); ?></td>	
                            <td><?php if($customer['management']!=null){echo "כן";}else{ echo "לא";} ; ?></td>	
                            </tr>
                            <?php } ?>
                        </tbody>
              </table>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $("#btnCostumers").click(function(){
              $("#usersTable").toggle();
  });
});
    </script>
  </section>
</main>    