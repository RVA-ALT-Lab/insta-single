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
        <link rel="stylesheet" href="css/main.css">
    </head>
<body>
<?php

 function getMediaByUrl($url){
    $json = file_get_contents($url);
    $media = json_decode($json);
    return $media;
 }

 function getOwnerData($media){
    return $media->graphql->shortcode_media->owner;
 }

 function getMediaCaption($media){
    return $media->graphql->shortcode_media->accessibility_caption;
 }

 function getPostUrl($media){
    return 'https://www.instagram.com/p/' . $media->graphql->shortcode_media->shortcode;
 }

 function getPostImage($media){
    $array = $media->graphql->shortcode_media->display_resources;
    $last = end($array);
    return $last->src;
 }

 function getPostText($media){
    $caption = $media->graphql->shortcode_media->edge_media_to_caption->edges;
    $text = end($caption);
    return $text->node->text;
 }


if (isset($_GET['url'])) {
    $media = getMediaByUrl( $_GET['url'].'?__a=1');
} else {
    $media = getMediaByUrl('https://www.instagram.com/p/CDq1HyeFiRI/?__a=1');
}

//print("<pre>".print_r($media,true)."</pre>");


$account = getOwnerData($media)->username;
$profilePic = getOwnerData($media)->profile_pic_url;
$caption = getMediaCaption($media);
$url = getPostUrl($media);
$img_src = getPostImage($media);
$text = getPostText($media);

// //echo "Id: {$account->getId()}\n";
echo "<div class='card'>";
echo "<div class='profile-row'><div class='profile-bg'></div><img class='profile-image' src='{$profilePic}' alt='Profile image.'><a href='https://instagram.com/{$account}'>{$account}</a></div>";
echo "<a href='{$url}' target='_blank'>";
echo "<img src='{$img_src}' alt='{$caption}' class='img-fluid'></a><p class='card-text'>{$text}</p></div></div>";

;?>

</body>
</html>