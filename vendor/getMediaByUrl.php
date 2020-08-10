<!doctype html>
<html class="no-js" lang="EN">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Single Instagram Post</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="icon.png">
        <!-- Place favicon.ico in the root directory -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/main.css">
    </head>
<body>
<?php
require __DIR__ . '/../vendor/autoload.php';

// If account is public you can query Instagram without auth
$instagram = new \InstagramScraper\Instagram();

// If account is private and you subscribed to it, first login
// $instagram = \InstagramScraper\Instagram::withCredentials('username', 'password', '/path/to/cache/folder');
// $instagram->login();

if (isset($_GET['url'])) {
    $media = $instagram->getMediaByUrl( $_GET['url']);
} else {
    $media = $instagram->getMediaByUrl('https://www.instagram.com/p/CDtfAnZlx_i/');
}

$created = $media->getCreatedTime();


$account = $media->getOwner();
//echo "Id: {$account->getId()}\n";
echo "<div class='card'>";
echo "<div class='profile-row'><div class='profile-bg'></div><img class='profile-image' src='{$account->getProfilePicUrl()}' alt='Profile image.'><a href='https://instagram.com/{$account->getUsername()}'>{$account->getUserName()}</a></div>";
// echo "Number of comments: {$media->getCommentsCount()}";
// echo "Number of likes: {$media->getLikesCount()}";
echo "<a href='{$media->getLink()}' target='_blank'>";
echo "<img src='{$media->getImageHighResolutionUrl()}' alt='{$media->getCaption()}' class='img-fluid'></a><p class='card-text'>{$media->getCaption()}</p></div></div>";

;?>

</body>
</html>