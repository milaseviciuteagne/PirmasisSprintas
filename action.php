<!-- istrinaikeltus failus  -->


<?php
if(isset($_REQUEST['del'])) {
    $link = './/'.$_REQUEST['del'];
    if(unlink($link)) header('Location: ' . $_SERVER["HTTP_REFERER"]);
    else echo "Failed";
}
?>

