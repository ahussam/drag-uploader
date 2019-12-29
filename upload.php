<?php

header('Content-Type:applcation/json') ;

$uploaded = array() ; 


function generateRandomString($length = 20) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


if (!empty($_FILES['file']['name'][0])) {

foreach ($_FILES['file']['name'] as $dir => $name) {
	
	$folder = generateRandomString();
	mkdir('upload/'.$folder);
	if (move_uploaded_file($_FILES['file']['tmp_name'][$dir], 'upload/'.$folder.'/'. $name )) {
		$uploaded[]  = array('name' => $name, 
             'file' => 'upload/'.$folder.'/'. $name
			);
	}
}
}

echo json_encode($uploaded);
?>