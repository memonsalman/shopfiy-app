<?php
include 'db.php';
require_once("inc/functions.php");
$sql = "SELECT * FROM users";
$result = $conn->query($sql);


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://testing-store-for-the-app-test.myshopify.com/admin/api/2023-07/shop.json');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


$headers = array();
$headers[] = 'X-Shopify-Access-Token: shpua_775875b446e2762bcbdfd282e8090a2c';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);


$shop = json_decode($result);
$shop_detials = $shop->shop;




$owndernmae = $shop_detials->shop_owner;
$owndernmae_arry = explode(" ",$owndernmae);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Solvpath App</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>  
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'></link>  
   <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  
<div class="container">

<style>
.step{display:none;}
.step.active{display:block;}
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
    width: 100%;
    background-color: white;
    padding: 0px;
}

/* Full-width input fields */
input[type=text], input[type=password],input[type=email],select,input[type=url] {
  width: 100%;
  padding: 12px;
  margin: 10px 0 10px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus,input[type=email]:focus,input[type=url]:focus,select:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
    padding: 12px 40px;
    font-size: 16px;
    border: none;
    font-size: 19px;
    border-radius: 4px;
    margin-left: 10px;
    margin-right: 10px;
    background-color: #0096FF;
    color: white;
    box-shadow: 0 5px 15px 0px rgba(51, 183, 244, 0.5) !important;
}
/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
/* additional css start */
.container h3{
    padding-left: 20px;
    font-weight: bold;
    font-size: 35px;
    margin-bottom: 50px;
    margin-top: 30px;
}
.container .formsteps{
    display: flex;
    justify-content: space-between;
    width: 80%;
    margin: auto;
}
.counting{
    margin-bottom: 50px;
}
.container .formsteps li{
    list-style: none;
    font-size: 20px;
    font-weight: bold;
    z-index: 100;
}
.maindiv{
    display: flex;
}
.subhalf{
    padding: 0px 20px;
    width: 50%;
}
.subfull{
    padding: 0px 20px;
    width: 100%;
}
input{
    border: 2px solid black !important;
    border-radius: 4px !important;
    background-color: #f1f1f188 !important;
    font-size: 16px;
}
select{
    border: 2px solid black !important;
    border-radius: 4px !important;
    background-color: #f1f1f188 !important;
    font-size: 16px;
    padding: 14px;
}
input:focus{
    color: #495057;
    background-color: #fff;
    outline: 0;
    border: 2px solid #35c1d7;
    box-shadow: 0 0px 4px 2px rgba(51, 183, 244, 0.5) !important;

}
label{
    font-size: 17px;
    margin: 0px;
}
.allbtn{
    padding: 0px 10px;
    width: 100%;
    display: flex;
    justify-content: space-between;
    margin-bottom: 60px;
    margin-top: 35px;
}
.right_side{
  justify-content: end;
}
.allbtn button{
    padding: 12px 40px;
    font-size: 16px;
    border: none;
    font-size: 19px;
    border-radius: 4px;
    background-color: #35c1d7;
    color: white;
    cursor: pointer;
    box-shadow: 0 5px 15px 0px rgba(51, 183, 244, 0.5) !important;
    transition: 0.2s;
}
.allbtn button:hover{
    box-shadow: 0 5px 15px 5px rgba(51, 183, 244, 0.5) !important;
}
.sec_secmaindiv{
    display: flex;
}
.subsubhalf{
    width: 33.33%;
    padding: 0px 20px;
}
.formsteps li{
    padding: 7px 15px;
    font-size: 16px;
    border: none;
    font-size: 19px;
    border-radius: 4px;
    margin-left: 10px;
    margin-right: 10px;
    background-color: grey;
    color: white;
}
.main_body_container {
    width: 100%;
    background-color: white;
    display: flex;
    flex-wrap: wrap;
}
.sidebar{
  width: 17%;
  height: 100vh;
  background-color: #0e3549;
  padding-top: 0px;
}
.content{
  width: 83%;
  background-color: #fff;
  padding: 30px;
}
.side_menu {
    padding: 0px;
}
.side_menu li{
  font-size: 22px;
  font-weight: 500;
  color: white;
  list-style: none;
  /* padding-top: 15px; */
 
  border-bottom: 2px solid #35c1d7;
  transition: 0.3s;
}
ul.side_menu li:hover {
    background: #35c1d7;
}

.side_menu li a {
    color: white;
    width: 100%;
    padding: 15px 25px;
    display: inline-block;
    text-decoration: none;
}
.side_menu li a i{
  margin-right: 3px;
}
li.active {
    background: #35c1d7;
}






/* media for screen 1024 */

@media only screen and (max-width: 1024px) {
  .sidebar{
    width: 36%;
  }
  .content{
  width: 64%;
}
  .side_menu li {
    font-size: 18px;
}
.container h3 {
    padding-left: 20px;
    font-weight: bold;
    font-size: 26px;
    margin-bottom: 30px;
    margin-top: 0px;
}
input{
  font-size: 14px;
  margin: 0px !important;
}
select{
  font-size: 14px;
  margin: 0px !important;

}
.subhalf {
    padding: 0px 5px;
}
.subfull {
    padding: 0px 0px;
}
.allbtn {
    padding: 0px 0px;
}
label {
  font-size: 15px;
  margin-top: 15px !important;
  margin-bottom: 5px !important;
}
.sec_secmaindiv {
    display: block;
}
.subsubhalf {
    width: 100%;
    padding: 0px !important;
}
}



/* media for screen 768 */

@media only screen and (max-width: 768px) {
  .content {
    padding: 15px;
}
  .allbtn button {
    padding: 12px 20px;
    font-size: 16px;
}
.maindiv {
    display: block;
}
.subhalf {
    padding: 0px 0px;
    width: 100%;
}
.subfull {
    padding: 0px 0px;
}
.allbtn {
    padding: 0px 0px;
}
.sec_secmaindiv {
    display: block;
}
.subsubhalf {
    width: 100%;
    padding: 0px 10px;
}
}



/* media for screen 425 */

@media only screen and (max-width: 425px) {
  .sidebar{
    width: 45%;
  }
  .content{
  width: 55%;
}
  .side_menu li a {
    padding: 15px 10px;
}
  .side_menu li{
  font-size: 16px;
}
.container h3 {
  font-size: 21px;
  font-weight: bold;
  margin-bottom: 10px;
  margin-top: 10px;
  padding-left: 0px;
}
.content{
  padding: 15px;
}
.maindiv {
    display: block;
}
.maindiv {
    display: block;
}
.subhalf {
  width: 100%;
  padding: 0px;
}
.subfull{
  padding: 0px;
}
label {
  font-size: 15px;
  margin-top: 15px !important;
  margin-bottom: 5px !important;
}
input{
  padding: 5px !important;
  font-size: 14px;
  margin: 0px !important;
}
select{
  padding: 7px !important;
  font-size: 14px;
  margin: 0px !important;

}
.sec_secmaindiv {
    display: block;
}
.subsubhalf {
    width: 100%;
    padding: 0px !important;
}
.allbtn button {
    padding: 8px 8px;
    font-size: 13px;
    margin: 0px !important;
}
}





@media only screen and (max-width: 375px) {
  .side_menu li a i {
    width: 100%;
    margin-bottom: 3px;
}
.side_menu li{
  text-align: center;
}

}





/* additional css end */



</style>


<div class="main_body_container">
  <div class="sidebar">
      <ul class="side_menu">
        <li class="active"><a href="#"><i class="fa-solid fa-user-plus" style="color: #ffffff;"></i> Registration</a></li>
        <li class=""><a href="#"><i class="fa-solid fa-headset" style="color: #ffffff;"></i> Customer</a></li>
        <li class=""><a href="#"><i class="fa-solid fa-tags" style="color: #ffffff;"></i> Ticket</a></li>
        <li class=""><a href="#"><i class="fa-solid fa-arrow-right-to-bracket" style="color: #ffffff;"></i> Login</a></li>
      </ul>
  </div>

  <div class="content">
      <div class="container">
        <h3><i class="fa-solid fa-angles-right" style="color: #000000;"></i> Create An Account</h3>
          <!-- <div class="counting">
              <ul  class="formsteps">
                  <li id="step1" class="active"><span class="step">1</span><span class="title">Step 1</span></li>
                  <li id="step2" class=""><span class="step">2</span><span class="title">Step 2</span></li>
                  <li id="step3" class=""><span  class="step">3</span><span class="title">Step 3</span></li>
              </ul>
          </div> -->
        <div class="step step1 active">
          <form id="form1" method="post">
            <input type="hidden"  name="shopid" id="shopid" value="<?php echo $shop_detials->id; ?>"> 
            <div class="maindiv">
                <div class="subhalf">
                    <label for="fname"><b>First Name</b></label>
                    <input type="text" placeholder="First Name" name="fname" id="fname" required value="<?php echo $owndernmae_arry[0]; ?>">
                </div>
                <div class="subhalf">
                    <label for="lname"><b>Last Name</b></label>
                    <input type="text" placeholder="Last Name" name="lname" id="lname" required  value="<?php echo $owndernmae_arry[1]; ?>">
                </div>
            </div>
            <div class="maindiv">
                <div class="subhalf">
                    <label for="email"><b>Email</b></label>
                    <input type="email" placeholder="Enter Email" name="email" id="email" required value="<?php echo $shop_detials->email; ?>">
                </div>
                <div class="subhalf">
                    <label for="phone"><b>Phone</b></label>
                    <input type="text" placeholder="Enter Phone" name="phone" id="phone" required value="<?php echo $shop_detials->phone; ?>">
                </div>
            </div>
            
              <div class="subfull">
                  <label for="psw"><b>Password</b></label>
                  <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
              </div>
              <div class="subfull">
                  <label for="cpsw"><b>Confirm Password</b></label>
                  <input type="password" placeholder="Enter Confirm Password" name="psw" id="cpsw" required>
              </div>
              <div class="allbtn right_side">
                  <button type="submit" class="next11">STEP 2 <i class="fa-solid fa-angle-right" style="color: #ffffff;"></i></button>
              </div>
      
          </form>
        </div>  



        <div class="step step2">
            <form id="form2" method="post">
                <div class="subfull">
                  <label for="company_name"><b>Company Name</b></label>
                  <input type="text" placeholder="Enter Company Name" name="company_name" id="company_name" required value="<?php echo $shop_detials->name; ?>">

                  <label for="address_line_1"><b>Address Line 1</b></label>
                  <input type="text" placeholder="Enter Address Line 1" name="address_line_1" id="address_line_1" required value="<?php echo $shop_detials->address1; ?>">
              
                  <label for="address_line_2"><b>Address Line 2</b></label>
                  <input type="text" placeholder="Enter Address Line 2" name="address_line_2" id="address_line_2" required value="<?php echo $shop_detials->address2; ?>">
                </div>
                <div class="sec_secmaindiv">
                  <div class="subsubhalf">
                    <label for="city"><b>City</b></label>
                    <input type="text" placeholder="Enter City" name="city" id="city" required value="<?php echo $shop_detials->city; ?>">
                  </div>
                  <div class="subsubhalf">
                    <label for="state"><b>State</b></label>
                    <select name="state" class="state" formcontrolname="state" id="state" required><option  value="">Select State</option><option  value="AL">Alabama</option><option  value="AK">Alaska</option><option  value="AZ">Arizona</option><option  value="AR">Arkansas</option><option  value="CA">California</option><option  value="CZ">Canal Zone</option><option  value="CO">Colorado</option><option  value="CT">Connecticut</option><option  value="DE">Delaware</option><option  value="DC">District Of Columbia</option><option  value="FL">Florida</option><option  value="GA">Georgia</option><option  value="GU">Guam</option><option  value="HI">Hawaii</option><option  value="ID">Idaho</option><option  value="IL">Illinois</option><option  value="IN">Indiana</option><option  value="IA">Iowa</option><option  value="KS">Kansas</option><option  value="KY">Kentucky</option><option  value="LA">Louisiana</option><option  value="ME">Maine</option><option  value="MD">Maryland</option><option  value="MA">Massachusetts</option><option  value="MI">Michigan</option><option  value="MN">Minnesota</option><option  value="MS">Mississippi</option><option  value="MO">Missouri</option><option  value="MT">Montana</option><option  value="NE">Nebraska</option><option  value="NV">Nevada</option><option  value="NH">New Hampshire</option><option  value="NJ">New Jersey</option><option  value="NM">New Mexico</option><option  value="NY">New York</option><option  value="NC">North Carolina</option><option  value="ND">North Dakota</option><option  value="OH">Ohio</option><option  value="OK">Oklahoma</option><option  value="OR">Oregon</option><option  value="PA">Pennsylvania</option><option  value="PR">Puerto Rico</option><option  value="RI">Rhode Island</option><option  value="SC">South Carolina</option><option  value="SD">South Dakota</option><option  value="TN">Tennessee</option><option  value="TX">Texas</option><option  value="UT">Utah</option><option  value="VT">Vermont</option><option  value="VI">Virgin Islands</option><option  value="VA">Virginia</option><option  value="WA">Washington</option><option  value="WV">West Virginia</option><option  value="WI">Wisconsin</option><option  value="WY">Wyoming</option></select>
                  </div>
                  <div class="subsubhalf">
                    <label for="zip_code"><b>Zip Code</b></label>
                    <input type="text" placeholder="Enter Zip Code" name="zip_code" id="zip_code" required value="<?php echo $shop_detials->zip; ?>">
                  </div>
                </div>
                <div class="allbtn">
                  <button type="button" class="back1"><i class="fa-solid fa-angle-left" style="color: #ffffff;"></i> STEP 1</button>
                  <button type="submit" class="next22">STEP 3 <i class="fa-solid fa-angle-right" style="color: #ffffff;"></i></button>
                </div>
            </form>
        </div>
      
        <div class="step step3">
            <form id="form3" method="post">
                <div class="subfull">
                    <label for="main_website"><b>Main Website</b></label>
                    <input type="text" placeholder="Enter Main Website" name="main_website" id="main_website" required value="<?php echo 'https://'.$shop_detials->domain; ?>">
                </div>
                <div class="subfull">
                    <label for="current_crm"><b>Current CRM</b></label>
                    <select class="current_crm" id="current_crm" name="current_crm">
                    <option value="0">Shopify</option>
                    <!-- <option value="1">WooCommerce</option>
                    <option value="2">Big Commerce</option>
                    <option value="3">Konnektive</option>
                    <option value="4">Sticky.io</option>
                    <option value="5">Magento</option>
                    <option value="6">Opencart</option>
                    <option value="7">WIX</option>
                    <option value="8">SquareSpace</option>
                    <option value="9">Salesforce Commerce</option>
                    <option value="10">Click Funnels</option>
                    <option value="11">Groove Funnels</option>
                    <option  value="12">Your own-Proprietary</option>
                    <option value="13">Other</option> -->
                    </select>
                </div>
                <div class="subfull">
                    <label for="industry"><b>Industry</b></label>
                    <input type="text" placeholder="Enter Industry" name="industry" id="industry" required>
                </div>
                <div class="subfull">
                    <label for="monthly_support_tickets"><b>Monthly Support Tickets</b></label>
                    <select class="monthly_support_tickets" id="monthly_support_tickets" name="monthly_support_tickets">
                    <option value="0">100 - 999</option>
                    <option value="1">1,000 - 1,999</option>
                    <option value="2">2,000 - 4,999</option>
                    <option value="3">5,000 - 9,999</option>
                    <option value="4">10,000 - 19,999</option>
                    <option value="5">20,000+</option>
                    </select>
                </div>
                <div class="allbtn">
                    <button type="button" class="back2"><i class="fa-solid fa-angle-left" style="color: #ffffff;"></i> STEP 2</button>
                    <button type="submit" class="registerbtn">REGISTER</button>
                </div>
            </form>
          </div>
        </div>
      </div>
</div>

  

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
$(document).ready(function(){

  var password = document.getElementById("psw")
  , confirm_password = document.getElementById("cpsw");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
  
$(document).on("click","button.back2,button.next1",function(event) 
{
   event.preventDefault()
$('.step1').removeClass('active') 
$('.step3').removeClass('active')   
$('.step2').addClass('active')
$('li#step2').addClass('active')
$('li#step3').removeClass('active')   

});

$(document).on("click","button.next2",function(event2) 
{
   event2.preventDefault()
$('.step1').removeClass('active') 
$('.step2').removeClass('active')   
$('.step3').addClass('active')
$('li#step3').addClass('active')
});

$(document).on("click","button.back1",function(event3) 
{
   event3.preventDefault()
$('.step3').removeClass('active') 
$('.step2').removeClass('active')   
$('.step1').addClass('active')
$('li#step2').removeClass('active')
$('li#step3').removeClass('active')
});
  


  jQuery('#form1').submit(function(event){
      event.preventDefault();
$('.step1').removeClass('active') 
$('.step3').removeClass('active')   
$('.step2').addClass('active')
$('li#step2').addClass('active')
$('li#step3').removeClass('active')   


      });

  jQuery('#form2').submit(function(event2){
      
event2.preventDefault()
$('.step1').removeClass('active') 
$('.step2').removeClass('active')   
$('.step3').addClass('active')
$('li#step3').addClass('active')
});

  jQuery('#form3').submit(function(event3){
      event3.preventDefault();


      
      var userdata= "action=registration&main_website="+jQuery('input#main_website').val()+"&current_crm="+jQuery('select#current_crm').val()+"&industry="+jQuery('input#industry').val()+"&monthly_support_tickets="+jQuery('select#monthly_support_tickets').val()+"&company_name="+jQuery('#company_name').val()+"&shopid="+jQuery('#shopid').val()+"&fname="+jQuery('#fname').val()+"&lname="+jQuery('#lname').val()+"&email="+jQuery('#email').val()+"&phone="+jQuery('#phone').val()+"&psw="+jQuery('#psw').val()+"&address_line_1="+jQuery('#address_line_1').val()+"&address_line_2="+jQuery('#address_line_2').val()+"&city="+jQuery('#city').val()+"&state="+jQuery('#state').val()+"&zip_code="+jQuery('#zip_code').val();


      //alert(userdata);
      jQuery.ajax({

            dataType:"json",
            type:"post",

            //data : jQuery('#form').serialize(),
             data:userdata,
            url:'https://webdevelopment33.com/solvpath/registration.php',
             success: function(data) 
             {
               if(data['status']==1)
               {
              swal("Thank You!",data['msg'], "success");  
                }
              else
               {
    swal("Oops!",data['msg'], "error");  

               }
             }

});
      });

});
</script>
</div>

</body>
</html>