<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sprint</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>


<?php
print('<h1>Directory contents</h1>');
      $path = "./" . $_GET["path"];
      $files = array_diff(scandir($path), array('..', '.'));
      echo ("<table>
      <thead>   
          <tr><th>Name</th><th>Type</th><th>Action</th>
      </thead>");
      foreach($files as $dir_c) {       
        print("<tr><td>" . "<a href='?path=" . $_GET['path'] . "/" . $dir_c . "'>" . $dir_c . "</a><br></td>");	
        print("<td>" . (is_dir($path . $dir_c) ? "Directory" : "File") . "</td>");     
        print("<td>" . "<a title='Delete' href='action.php?del=$dir_c'>Delete</a><br>");    
        print("<a href='action2.php?link=$dir_c'> Download </a>" . "</td></tr>");    

       
      } 
      print("</tbody>");
      echo ("</table>");
   ?> 
   




   <!-- logout -->

<div class='logout'>
               Click here to <a href = "index.php?action=logout"> logout.
</div>   
<?php 
    session_start();
    
    if(isset($_GET['action']) and $_GET['action'] == 'logout'){
        session_start();
        unset($_SESSION['username']);
        unset($_SESSION['password']);
        unset($_SESSION['logged_in']);
        print('Logged out!');
    }
?>




 <!-- ikelimas  ikelia i aplanka images -->

        <form action ="uploadfile.php" method = "POST" enctype = "multipart/form-data">
                <input class="chose_file" type = "file" name = "image"><br>
                <button type = "submit">Upload</button>
            </form>

<!-- sukurimas -->
<?php
    if (isset($_POST['foldername'])) {
        if ($_POST['foldername'] != "") {
         $dirCreate = './' . $_GET['path'] . $_POST['foldername'];
            if (!is_dir($dirCreate))
                mkdir($dirCreate, 0777, true);  
                header('location:second.php');
        }
    }
    ?>
<!-- pataisyti:ismeta is psl -->
<div method="post" action="second.php">
<input type="text" name="foldername">
<input type="button" name="submit" value="Create Folder">
</div>


<!-- back -->
<button onclick="history.go(-1);">Back </button>

</body>
</html>