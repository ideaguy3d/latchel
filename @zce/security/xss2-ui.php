<?php /*
~ Protecting against XSS attacks(stored/reflected), session hijacking, session fixation ~

1. Filter, Validate, Escape, & Sanitize (helps protect against XSS):
    htmlspecialchars(), htmlentities(), preg_replace(), str_replace(), filter_var()
    ctype_*(), preg_match(), strlen(), strip_tags(), casting to correct data type,

2. Session Hijacking:
    session_regenerate_id(), One time Hash(e.g. md5()) for $_SESSION, timed logout,
    create logout(

3. Session Fixation: */

session_start(); //session_regenerate_id();

// script vars, don't store important info
$id = 0;
$name = '';
$image = '';

// if input is not set, provide a default value
$default = new class() {
    // default values for input
    public string $name = 'Guest';
    public string $image = 'default.png';
    
    // default validation rules
    public int $nameMax = 128;
    public int $imageMax = 128;
    public int $valid = 0;
    public int $maxId = 999999;
    public array $error = ['id' => false, 'name' => false, 'image' => false, 'hash' => false];
    public string $validElem = '<p class="valid">Valid Input ✅😎👌</p>';
    
    public function error(string $input): string {
        return $this->error[$input] ?: $this->validElem;
    }
};

// All inputs should be tested if they are set, and then properly filtered
$username = $_GET['username'] ?? false;
if($username) {
    $username = strip_tags($username);
    $_SESSION['username'] = $username;
}
else if(isset($_SESSION['name'])) {
    $username = $_SESSION['username'];
}

$id = $_GET['id'] ?? null;
$id = !is_null($id) ? (int)$id : 0; // casting to int can filter xss

$name = $_GET['name'] ?? null;
$name = !is_null($name) ? strip_tags($name) : $default->name;
$name = preg_replace('/[^a-zA-Z,. ]/', '', $name);

$image = $_GET['image'] ?? null;
$image = !is_null($image) ? strip_tags($image) : $default->image;

// Validate the input
if($id > $default->maxId) $default->error['id'] = "ID must be less than $default->maxId";
else $default->valid++;

if(strlen($name) > $default->nameMax) {
    $name = $default->name;
    $default->error['name'] = "Name must be less than $default->nameMax";
}
else $default->valid++;

if(strlen($image) > $default->imageMax) {
    $image = $default->image;
    $default->error['image'] = "Image name must be less than $default->imageMax characters";
}
else if(!preg_match('/^.+(jpg|png)$/i', $image)) {
    $image = $default->image;
    $default->error['image'] = "Image must be a jpg or png";
}
else $default->valid++;

// Use a hash(e.g. md5()) & $_SESSION to prevent automated systems from
// hijacking the form(re-creating it) & auto-submitting it repeatedly
if($_SESSION['hash'] ?? null) {
    if(isset($_POST['hash']) && $_POST['hash'] == $_SESSION['hash']) $default->valid++;
    else $default->error['hash'] = 'ERROR: Please re-submit form';
}
$_SESSION['hash'] = md5($_SERVER['REMOTE_ADDR'] . date('m-d-Y H:i:s'));

//TODO:
// - create a CAPTCHA,
// - use HTML5 built in client validation

// log user out and destroy session


// to help me debug
echo "<p class='debug-info'>id = $id, name = $name, image = $image, username = $username</p><hr>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- setting the proper charset can help if an attacker used a foreign character set -->
    <meta charset="UTF-8">
    <title>Protect Against Stored XSS</title>
    <style>
        html {
            font-family: sans-serif;
        }

        table {
            width: 600px;
        }

        th {
            border: thin solid black;
            font-weight: bold;
        }

        td {
            border: thin solid black;
        }

        .debug-info {
            font-family: Consolas;
            font-size: small;
        }

        .valid {
            color: #1dc116;
            padding: 4px;
        }
        .float-right {
            float: right;
            padding-right: 16px;
        }
    </style>
</head>

<body>

<p class="float-right">
    Welcome <b><?= $username ? htmlentities($username) : 'Guest' ?></b>
    <br> id: <small> <?= session_id() ?></small>
</p>

<!-- Login -->
<?php if(false === $username) { ?>
    <form>
        <p>Please login:</p>
        <input name="username" type="text" maxlength="128" placeholder="username"><br>
        <input type="submit" value="Login"><br>
    </form>
<?php } ?>

<?php if(!empty($username)) { ?>
    <table>
        <tr>
            <th>Field</th>
            <th>Value</th>
        </tr>
        <tr>
            <td><i>id</i>
            <td>
                <pre>&lt;script>alert('XSS ATTACK');&lt;/script></pre>
            </td>
        </tr>
        <tr>
            <td><i>name</i></td>
            <td>
                <pre>%26%23x3C%3B%26%23x73%3B%26%23x63%3B%26%23x72%3B%26%23x69%3B%26%23x70%3B%26%23x74%3B%26%23x3E%3B%26%23x61%3B%26%23x6C%3B%26%23x65%3B%26%23x72%3B%26%23x74%3B%26%23x28%3B%26%23x27%3B%26%23x58%3B%26%23x53%3B%26%23x53%3B%26%23x20%3B%26%23x41%3B%26%23x54%3B%26%23x54%3B%26%23x41%3B%26%23x43%3B%26%23x4B%3B%26%23x27%3B%26%23x29%3B%26%23x3B%3B%26%23x3C%3B%26%23x2F%3B%26%23x73%3B%26%23x63%3B%26%23x72%3B%26%23x69%3B%26%23x70%3B%26%23x74%3B%26%23x3E%3B</pre>
                NOTE: urldecode() shows the value
                as <?php echo urldecode('%26%23x3C%3B%26%23x73%3B%26%23x63%3B%26%23x72%3B%26%23x69%3B%26%23x70%3B%26%23x74%3B%26%23x3E%3B%26%23x61%3B%26%23x6C%3B%26%23x65%3B%26%23x72%3B%26%23x74%3B%26%23x28%3B%26%23x27%3B%26%23x58%3B%26%23x53%3B%26%23x53%3B%26%23x20%3B%26%23x41%3B%26%23x54%3B%26%23x54%3B%26%23x41%3B%26%23x43%3B%26%23x4B%3B%26%23x27%3B%26%23x29%3B%26%23x3B%3B%26%23x3C%3B%26%23x2F%3B%26%23x73%3B%26%23x63%3B%26%23x72%3B%26%23x69%3B%26%23x70%3B%26%23x74%3B%26%23x3E%3B'); ?>
            </td>
        </tr>
        <tr>
            <td><i>image</i></td>
            <td>
                <pre>http://localhost:60/xss.php</pre>
            </td>
        </tr>
    </table>

    <br/>

    <!-- 3 input fields were checked -->
    <h1><?= 3 === $default->valid ? 'Successfully saved data' : 'Error, unable to save data' ?></h1>
    <form>
        <table>
            <tr class="form-id">
                <th>ID</th>
                <td><input type="text" name="id" size="8" maxlength="8"/></td>
                <!-- htmlentities($id);  -->
                <td>Current Value: <?php echo $id ?></td>
                <td><?= $default->error('name') ?></td>
            </tr>
            <tr class="form-name">
                <th>Name</th>
                <td><input type="text" name="name" maxlength="128"/></td>
                <td>Current Value: <?php echo htmlentities($name); ?></td>
                <td><?= $default->error('name') ?></td>
            </tr>
            <tr class="form-image">
                <th>Image</th>
                <td><input type="text" name="image"/></td>
                <td>
                    Current Value: <img src="<?php echo htmlentities($image); ?>"/>
                    <br> <small>img url: "<?= htmlentities($image) ?>"</small>
                </td>
                <td><?= $default->error('name') ?></td>
            </tr>
        </table>
        <input type="hidden" value="<?= $_SESSION['hash'] ?>">
        <input type="hidden" value="<?= $username ?: '' ?>">
        <br>
        <input type="submit"/>
    </form>

<?php } else { ?>

    <p>Unautheticated User 🛑</p>

<?php } ?>


</body>
</html>