<?php
// get Members table
require './Model/Members.php';
$memberTable = new Members();

// check to see if login
if(isset($_POST['data'])) {
    $email = $_POST['data']['email'] ?? '';
    $password = $_POST['data']['password'] ?? '';
    $phrase = $_POST['data']['phrase'] ?? '';
    $hash = $_POST['data']['hash'] ?? '';
    
    // *** take security precautions: filter all incoming data!
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $password = strip_tags(trim($password));
    $phrase = strip_tags(trim($phrase));
    
    if($email && $password && $phrase && $hash) {
        // *** session hijacking protection: implement 1 way hash & CAPTCHA
        if(!(isset($_SESSION['hash']) && $_SESSION['hash'] == $hash)) {
            $valid = false;
            //TODO: log this
            $error [] =  'Invalid form submission, please re-submit';
        }
        
        $result = $memberTable->loginByName($email, $password);
        if($result) {
            // store user info in session
            $_SESSION['user'] = $result;
        }
        else {
            $valid = false;
            $error [] = 'Unable to login';
        }
    }
    else {
        $valid = false;
        $error [] = 'There is missing info';
    }
    
    if($valid) {
        $_SESSION['login'] = true;
        header('Location: ?page=home');
        exit;
    }
    else {
        $_SESSION['login'] = false;
    }
    
} // END OF: if(isset($data)){}

$newHash = md5(date('YmdHis') . session_id());
$_SESSION['hash'] = $newHash;

?>

<div class="content">
    <br/>
    <div class="product-list">

        <h2>Login</h2>
        <br/>

        <b>Please enter your information.</b><br/><br/>
        <form action="?page=login" method="POST">
            <p>
                <label>Email: </label>
                <!-- // *** consider using the HTML5 "email" type instead of "text" -->
                <input type="email" name="data[email]"/>
            </p>
            <p>
                <label>Password: </label>
                <!-- // *** consider using the "password" type instead of "text" -->
                <input type="text" name="data[password]"/>
            </p>
            <p>
                <!-- // *** session hijacking prevention: add 1 way hash + CAPTCHA -->
                <input type="reset" name="data[clear]" value="Clear" class="button"/>
                <input type="submit" name="data[submit]" value="Submit" class="button marL10"/>
                <input type="hidden" name="data[hash]" value="<?= $newHash ?>">
            </p>
            <p style="color: red">
                <?php if(!$valid): ?>
                    <?= implode('<br>', $error) ?>
                <?php endif; ?>
            </p>
        </form>
    </div><!-- product-list -->
</div>
