<?php
$fbpx = $_POST['fbpx'];
$params = array(
    'offerId' => 673,
    'fullName' => $_POST['name'],
    'phone' => $_POST['phone'],
    'partnerId' => 296781,
    'price' => 990,
    'country' => 'KZ',
    'access-token' => 'ac143249ca8535fe69b9445f0766beb4',
    'sub_id' => array($_POST['sub1'], $_POST['sub2'], $_POST['sub3'], $_POST['sub4'], $_POST['sub5']),
    'ip' => $_SERVER['REMOTE_ADDR'],
    'splitId' => '43387',
    'comment' => '',
);

if(!empty($_POST['phone'])){
	if($curl = curl_init()){
		curl_setopt($curl, CURLOPT_URL, 'https://api.m4leads.com/order/add?'.http_build_query($params));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($curl);
		$resp = json_decode($result, true);
		curl_close($curl);
		if ($resp['information']['statusCode'] == 200) {
			header('Location: success.php?fbpx=' . $fbpx);
		}else{
			echo 'error';
		}
	}else{
		echo 'error';
	}
}
?>