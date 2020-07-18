<?php
$pdo = new PDO(
    'mysql:host=127.0.0.1;dbname=lara1', 'root', '',
    [PDO::FETCH_ASSOC]
);
$data = $pdo->prepare('select body from post2b order by created_at desc limit 5');
$data->execute();
$data = $data->fetchAll();

$s = '<p class="c">Top Runner\'s ™</p>';

// &lt;p class=&quot;c&quot;&gt;Top Runner's ™&lt;/p&gt;
$e = htmlspecialchars($s);
// &lt;p class=&quot;c&quot;&gt;Top Runner&#039;s ™&lt;/p&gt;
$e2 = htmlspecialchars($s, ENT_QUOTES);
// &lt;p class=&quot;c&quot;&gt;Top Runner&#039;s &trade;&lt;/p&gt;
$e3 = htmlentities($s, ENT_QUOTES); // html entities are also encoded e.g. tm
// &lt;p class=&quot;c&quot;&gt;Top Runner&#039;s &trade;&lt;/p&gt;
$e4 = filter_var($s, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

$debug = 1;

/*
~~ POTENTIAL_XSS ~~
--
data1 = " onmouseover="alert(5522)";
input value = data1
--
// url encoding
data1 = <script>alert(1)</sc"%2B"ript>
.com/?q=data1
--
// js hexadecimal encoding
data1 = \x3cscript\x3ealert(1)\x3c/script\x3e
.com/?q=data1
*/
?>

<html lang="en">

<body>

<h4>Best Sellers <span id="best-seller"></span></h4>

<h1>Products for sale</h1>
<ul>
    <?php foreach($data as $datum) { ?>
        <li>
            Product: <a href="#"><?= $datum['body'] ?></a><br>
            <label for="bid">Place your bid</label>
            <input type="text" id="bid" value="For product <?= $datum['body'] ?>">
            <br><br>
        </li>
    <?php } ?>
</ul>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    let output = 'top product';
    
    <?php
    if($_GET['q'] ?? null) {
        printf('output = "%s"', htmlspecialchars($_GET['q'], ENT_QUOTES));
    }
    ?>

    //document.getElementById('best-seller').innerHTML = output;
    $(() => {
        $("#best-seller").html(output);
    })
</script>

</body>

</html>
