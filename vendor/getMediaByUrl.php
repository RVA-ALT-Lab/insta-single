<?php
require __DIR__ . '/../vendor/autoload.php';

// If account is public you can query Instagram without auth
$instagram = new \InstagramScraper\Instagram();

// If account is private and you subscribed to it, first login
// $instagram = \InstagramScraper\Instagram::withCredentials('username', 'password', '/path/to/cache/folder');
// $instagram->login();

$media = $instagram->getMediaByUrl('https://www.instagram.com/p/CDtfAnZlx_i/');
echo "Created at: {$media->getCreatedTime()}\n";
echo "Caption: {$media->getCaption()}\n";
echo "Number of comments: {$media->getCommentsCount()}";
echo "Number of likes: {$media->getLikesCount()}";
echo "Get link: {$media->getLink()}";
echo "High resolution image: <img src='{$media->getImageHighResolutionUrl()}' alt='{$media->getCaption()}'>";
$account = $media->getOwner();
echo "Account info:\n";
echo "Id: {$account->getId()}\n";
echo "Username: {$account->getUsername()}\n";
echo "Full name: {$account->getFullName()}\n";
echo "Profile pic url: {$account->getProfilePicUrl()}\n";
