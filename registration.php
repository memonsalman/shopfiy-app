<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");

include 'db.php';

if(isset($_POST['action']))
{

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$psw = md5($_POST['psw']);  
$company_name = $_POST['company_name'];
$address_line_1 = $_POST['address_line_1'];
$address_line_2 = $_POST['address_line_2'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip_code = $_POST['zip_code'];
$main_website = $_POST['main_website'];
$current_crm = $_POST['current_crm'];
$industry = $_POST['industry'];
$store_id = $_POST['shopid'];
$monthly_support_tickets = $_POST['monthly_support_tickets'];
$default_payment_source = '1998';

 $query = "SELECT emails FROM users WHERE emails='$email'";
  $result = $conn->query($query);
  if ($result->num_rows > 0) 
  {
   echo json_encode(array("status"=>0,'msg'=>'This Email is alredy exists'));
  }
  else
  {

// Data should be passed as json format
$data_json = json_encode($data);

$url = 'https://api.staging.solvpath.com/auth/users/create';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,'{
    "email": "'.$email.'",
    "password": "'.$_POST['psw'].'",
    "first_name": "'.$fname.'",
    "last_name": "'.$lname.'",
    "account": {
        "name": "'.$company_name.'",
        "default_payment_source": '.$default_payment_source.',
        "current_crm": '.$current_crm.',
        "monthly_support_tickets": '.$monthly_support_tickets.',
        "website": "'.$main_website.'",
        "industry": "'.$industry.'",
        "default_address": {
            "address1": "'.$address_line_1.'",
            "address2": "'.$address_line_2.'",
            "city": "'.$city.'",
            "state": "'.$state.'",
            "zip": "'.$zip_code.'",
            "country": "US"
        }
        
    },
    "test_phone": "'.$phone.'",
    "phone": "'.$phone.'"
}');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response  = curl_exec($ch);

curl_close($ch);
$finalarray = json_decode($response);
$app_id = $finalarray->id;
if(!empty($app_id))
{

    $sql = "INSERT INTO users (first_name, last_name, emails,phone,passswords,company_name,address_line_1,address_line_2,city,state,zip_code,main_website,current_crm,industry,monthly_support_tickets,store_id,app_id)
VALUES ('$fname', '$lname', '$email','$phone','$psw','$company_name','$address_line_1','$address_line_2','$city','$state','$zip_code','$main_website','$current_crm','$industry','$monthly_support_tickets','$store_id','$app_id')";

if ($conn->query($sql) === TRUE) 
{
echo json_encode(array("status"=>1,'msg'=>'Thanks you!,we will get back to you very shortly'));
}
else 
{
  echo json_encode(array("status"=>0,'msg'=>'sorry something went wrong. please try again later'));
}

}
else
{
if(!empty($finalarray->email))
{
    echo json_encode(array("status"=>0,'msg'=>$finalarray->email[0]));
}
else if(!empty($finalarray->test_phone))
{
    echo json_encode(array("status"=>0,'msg'=>$finalarray->test_phone[0]));
}
else if(!empty($finalarray->phone))
{
    echo json_encode(array("status"=>0,'msg'=>$finalarray->phone[0]));
}
else if(!empty($finalarray->password))
{
    echo json_encode(array("status"=>0,'msg'=>$finalarray->password[0].','.@$finalarray->password[1]));
}


}


  }

}

?>  