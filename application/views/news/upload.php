<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<form method="post" action="<?=base_url()?>news/upload_photo" enctype="multipart/form-data">
    <input type="file" name="photo">
    <input type="submit" name="send" value="Send">
    
</form>
</body>
</html>