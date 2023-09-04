<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$new_content = '';
$content = '';
$url = '';

if ("POST"===$_SERVER["REQUEST_METHOD"]) {
    $url = isset($_POST['url']) ? $_POST['url'] : '';
    $content = file_get_contents($url);
    $contents =$content;
    $blocked = array();

    if (isset($_POST['Ads'])) {
        $blocked[] = '/<script[^>]*src="\/\/pagead2\.googlesyndication\.com[^>]*><\/script>\s*<ins[^>]*class="adsbygoogle"[^>]*>.*<\/ins>\s*<script\b[^>]*>(.*?)<\/script>/s';
    }
    if (isset($_POST['analytics'])) {
        $blocked[] = '/<script async src="https:\/\/www\.googletagmanager\.com\/gtag\/js\?id=.*?<\/script>\s*<script\b[^>]*>(.*?)<\/script>/s';
    }
    if (isset($_POST['sound_cloud'])) {
        $blocked[] = '/<iframe[^>]+soundcloud\.com\/player[^>]+>[\s\S]*?<\/iframe>/';
    }
    if (isset($_POST['youtube'])) {
        $blocked[] = '/<iframe[^>]+youtube\.com\/embed[^>]+>[\s\S]*?<\/iframe>/';
    }

    if (!empty($_POST['custom_script'])) {
        $custom_script = preg_quote($_POST['custom_script'], '/');
        $blocked[] = "/$custom_script/";
    }
    if(!empty($_POST['custom_entry']))
    {
        $custom_entry=$_POST['custom_entry'];
        $contents = str_replace('</body>', $custom_entry . '</body>', $contents);
    }

    if (!empty($blocked)) {
        $new_content = preg_replace($blocked, '', $contents);
    } else {
        $new_content = $contents; // No patterns to block, keep the content unchanged
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Assignment-1</title>
</head>
<body>
    <form method="post">
        <label for="url">Enter the url:  </label>
            <input type="text" id="url" name="url" value="test.html"> <br>
            <label for="Ads">Google Ads </label>
            <input type="checkbox"  id="Ads" name="Ads" value="ads"> <br>
            <label for="analytics">Google Analytics </label>
            <input type="checkbox" id="analytics" name="analytics" value="analytics"> <br>
            <label for="sound_cloud">Sound Cloud </label>
            <input type="checkbox" id="sound_cloud" name="sound_cloud" value="sound_cloud">  <br>
            <label for="youtube">Youtube Embedd</label>
            <input type="checkbox" id="youtube" name="youtube" value="youtube"> <br>
            <label for="custom_script">Enter the Script to block:</label>
            <input type="text" id="custom_script" name="custom_script"> <br>
            <label for="custom_entry">Enter the Script to insert : </label>
            <input type="text" id="custom_entry" name="custom_entry"> <br>
        <input type="submit" value="Submit">
    </form>
    <hr>
    <h2>Modified Content</h2>
    <?= $new_content; ?>
</body>
</html>
