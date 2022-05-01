<?php
$host		= "93.16.2.231"; 	/* Host name */
$user 		= "codeur"; 		/* User */
$password 	= "coding"; 		/* Password */
$dbname 	= "metatube"; 		/* Database name */

$con = mysqli_connect($host, $user, $password, $dbname);
// Check connection
if (!$con) {
  //die("Connection failed: " . mysqli_connect_error());
}

function giveId() {
	$alphabet = [
		1 => "a",
		2 => "b",
		3 => "c",
		4 => "d",
		5 => "e",
		6 => "f",
		7 => "g",
		8 => "h",
		9 => "i",
		10 => "j",
		11 => "k",
		12 => "l",
		13 => "m",
		14 => "n",
		15 => "o",
		16 => "p",
		17 => "q",
		18 => "r",
		19 => "s",
		20 => "t",
		21 => "u",
		22 => "v",
		23 => "w",
		24 => "x",
		25 => "y",
		26 => "z",
	];

	$id = "";

	for ($i = 1; $i <= 20; $i++) {
		if (rand(1, 2) == 1) {
			$id = $id . rand(0, 9);
		} else {
			if (rand(1, 2) == 1) {
				$id = $id . $alphabet[rand(1, 26)];
			} else {
				$id = $id . strtoupper($alphabet[rand(1, 26)]);
			}
		}
	}
	return $id;
}

function debug_to_console($data) {
	$output = $data;
	if (is_array($output))
		$output = implode(',', $output);
}

function checkid($id) {
	$opts = array(
		'http' => array(
			'method' => "GET",
		)
	);

	$context = stream_context_create($opts);

	$fp = fopen($apiUrl . 'video/' . $id, 'r', false, $context);
	fpassthru($fp);
	fclose($fp);
	var_dump($context);
}

function upload()
{

  // $_SESSION['message'] = $_FILES;

  $apiUrl = 'http://93.16.2.231:8081/';
  // $apiUrl = 'http://127.0.0.1:8081/';

  $id = giveId();
  
  if (array_key_exists('video', $_FILES)) {
    if ($_FILES['video']['error'] === UPLOAD_ERR_OK) {
      echo 'upload was successful';
    } else {
      die("Upload failed with error code " . $_FILES['video']['error']);
    }
  }
  $maxsize = 1000000000000;
  if (isset($_FILES['video']['name']) && $_FILES['video']['name'] != '') {
    $path_key = "C:/Users/Ruiseki/sprint/MetaTube/storage/";
    // $path_key = "/Users/celian/Documents/MetaTube/storage/";
    $target_file = $path_key . $_FILES["video"]["name"];

    // Select file type
    $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("mp4", "avi", "3gp", "mov", "mpeg");

    // Check extension
    if (in_array($extension, $extensions_arr)) {
      // Check file size
      if (($_FILES['video']['size'] >= $maxsize) || ($_FILES["video"]["size"] == 0)) {
      } else {
        // Upload
        if (move_uploaded_file($_FILES['video']['tmp_name'], $path_key . $id . '.' . $extension)) {

          $img_file = $_FILES['thumbnail']['tmp_name'];
          $imgData = base64_encode(file_get_contents($img_file));

          $data = array(
            "id"          => $id,
            "creator"     => "00000000000000000000",
            "title"       => $_POST['title'],
            "description" => $_POST['description'],
            "privacy"     => "public",
            "thumbnail"   => $imgData
          );

          $option = array(
            'http' => array(
              'method' => 'POST',
              'content' => json_encode($data),
              'header' => "Content-Type: application/json\r\n" . "Accept: application/json\r\n"
            )
          );
          $context = stream_context_create($option);
          $result = file_get_contents($apiUrl . 'upload/video', false, $context);
          $response = json_decode($result);
        }
      }
    } else {
      $_SESSION['message'] = "Invalid file extension.";
    }
  } else {
    $_SESSION['message'] = "Please select a file.";
  }
  header('location: index.php?name=channel_page');
  exit;
}
