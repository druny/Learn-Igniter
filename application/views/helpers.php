<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

    <p>Submit the word you see below:</p>
    <?php

    echo $cap['image']; ?>
    <form action="/helpers/captcha" method="post">
        <input type="text" name="captcha">
        <input type="submit" value="Send">
    </form>
    <?php echo $this->benchmark->memory_usage();?>
</body>
</html>