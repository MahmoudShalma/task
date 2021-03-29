
<?php 
    session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
<p><?php   if(isset($_SESSION['message'])){  echo $_SESSION['message'];     unset($_SESSION['message']); } ?></p>

    <div class="container">
        <h2>Task form</h2>
        <form method="post" action="action.php" enctype="multipart/form-data">

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title_AR" aria-describedby="" placeholder="Enter Title" required>
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <input type="text" name="content" class="form-control" id="title_AR" aria-describedby="" placeholder="Enter Content" required>
            </div>

            <div class="form-row">
                <label for="start">
                    Enter the Date:
                </label>

                <input type="date" name="time" placeholder="dd-mm-yyyy" require>
            </div>


            <div class="form-row">
                <div>Choose Image file:</div>
                <div>
                    <input type="file" name="fileToUpload" id="fileToUpload">
                </div>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>

</html>