<?php

/*
~ protecting against stored XSS attacks ~
protect_against_xss_stored_1
protect_against_xss_stored_2
*/

// prevent PHP from echoing out information
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
    public array $error = ['id' => '', 'name' => '', 'image' => ''];
};

// All inputs should be tested if they are set, and then properly filtered
$id = $_GET['id'] ?? null;
$id = is_null($id) ? (int)$id : 0; // casting to int can filter xss

$name = $_GET['name'] ?? null;
$name = is_null($name) ? strip_tags($name) : $default->name;
$name = preg_replace('/[^a-zA-Z,. ]/', '', $name);

$image = $_GET['image'] ?? null;
$image = is_null($image) ? strip_tags($image) : $default->image;

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
    $default->error['image'] = "Image must be a jpg, png";
}
else $default->valid++;

// to help me debug
echo "id = $id, name = $name, image = $image";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Protect Against Stored XSS</title>
    <style>
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
    </style>
</head>

<body>
<h1>protect_against_xss_stored_1.php</h1>
<h2>To Notice:</h2>
<ul>
    <li>First time: <i>Undefined Index</i> notices</li>
    <li>All fields are subject to stored XSS</li>
</ul>

<br/>Try entering the following values:
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
<p><?= 3 === $default->valid ? 'Successfully saved data' : 'Error, unable to save data' ?></p>
<form>
    <table>
        <tr class="form-id">
            <th>ID</th>
            <td><input type="text" name="id" size="8" maxlength="8"/></td>
            <td>Current Value: <?php echo htmlentities($id); ?></td>
            <td><?= $default->error['id'] ?></td>
        </tr>
        <tr class="form-name">
            <th>Name</th>
            <td><input type="text" name="name" maxlength="128"/></td>
            <td>Current Value: <?php echo htmlentities($name); ?></td>
            <td><?= $default->error['name'] ?></td>
        </tr>
        <tr class="form-image">
            <th>Image</th>
            <td><input type="text" name="image"/></td>
            <td>Current Value: <img src="<?php echo htmlentities($image); ?>"/></td>
            <td><?= $default->error['image'] ?></td>
        </tr>
    </table>
    <input type="submit"/>
</form>

</body>
</html>