require connecion.php;

<?php

session_start();


require 'connection.php';    // include

if ($_SERVER['REQUEST_METHOD'] == "POST") {




    $title = $_POST['title'];
    $content = $_POST['content'];
    $time = $_POST['time'];


    $Message = '';

    $fileName = $_FILES['fileToUpload']['name'];

    $fileTmpName = $_FILES['fileToUpload']['tmp_name'];

    $fileExt = explode('.', $fileName);

    $count =   count($fileExt);

    // $fileExt[1];

    $extension = strtolower($fileExt[$count - 1]);

    $name = time() . $fileExt[0] . '.' . $extension;

    $allow_ex = array('jpg', 'gif', 'png', 'php', 'xls', 'doc');

    if (in_array($extension, $allow_ex)) {

        $uploadFolder = './uploads/';
        $destPath = $uploadFolder . $name;

        if (move_uploaded_file($fileTmpName, $destPath)) {
            echo 'File Uploaded';
        } 
        
        else {
            echo 'Error in Upload File';
        }
        $query = "insert into posts (title,content,time1,image1) values('$title','$content','$time','$fileName')";

        $result =   mysqli_query($con, $query);
        if ($result) {
            $Message =  'data inserted ';
        } else {
            $Message =   'error in insert op';
        }

        $uploadOk = 1;
    } else {
        $Message = "error data";

        $uploadOk = 0;
    }


    $_SESSION['message'] = $Message;

    header('Location: form.php');
} else {

    $errorMessage =  'Error in request method';

    header('Location: index.php?errorMessage=' . $errorMessage);
}
  




   

// $title = $_POST['title'];
// $content = $_POST['content'];
// $time = $_POST['time'];


// if (!preg_match("/^[a-zA-z]*$/", $title)) {
//     $ErrMsg = $title . " is not a valid Title, Only alphabets and whitespace are allowed.";
//     echo $ErrMsg;
// } 

// echo "<br><br>";

// if (!preg_match("/^[a-zA-z]*$/", $content)) {
//     $ErrMsg = $content . " is not a valid Content, Only alphabets and whitespace are allowed.";
//     echo $ErrMsg;
// }

// echo "<br><br>";

// echo $time;

// // Check if image file is a actual image or fake image
// $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
// if ($check !== false) {
//     echo "File is an image - " . $check["mime"] . ".";
//     $uploadOk = 1;
// } else {
//     echo "File is not an image.";
//     $uploadOk = 0;
// }
