<?php
/**
 * Created by PhpStorm.
 * User: Julius Alvarado
 * Date: 9/29/2019
 * Time: 11:10 PM
 */


echo "ello ^_^/ I am <br><br>";
echo `whoami`;

?>

<br>
<hr>
<br>

<form action="post.php" enctype="multipart/form-data" method="post">
    <input type="hidden" name="MAX_FILE_SIZE" value="3000000">
    Drop and Drop file <input name="rsm_data" type="file">


    <p>add pics</p>
    <!-- array of files -->
    <input type="file" name="pics[]">
    <input type="file" name="pics[]">
    <input type="file" name="pics[]">
    <input type="file" name="pics[]">
    <input type="file" name="pics[]">

    <br><br>
    <!-- send data to form -->
    <input type="submit" value="Start Processing">
</form>

<br>
<hr><br>

<form action="post.php" method="post" enctype="multipart/form-data">
    Send these files:<br/>

    <input name="userfile[]" type="file"/><br/><br>

    <input type="submit" value="Send files"/>
</form>

