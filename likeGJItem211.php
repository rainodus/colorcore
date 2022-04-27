<?php
require 'lib/db.php';
require 'lib/main.php';

$accountID = $_POST['accountID'];
$gjp = $_POST['gjp'];
$itemID = $_POST['itemID'];
$like = ($_POST['like'] == 1) ? 1 : 0;
$type = $_POST['type'];

GJP::check($accountID, $gjp);
if($type == 1) { //level
    if($like == 1) $query = $db->prepare("UPDATE levels SET likes = (likes + 1) WHERE levelID = :itemID");
    else if($like == 0) $query = $db->prepare("UPDATE levels SET likes = (likes - 1) WHERE levelID = :itemID");
    $query->execute([':itemID' => $itemID]);
    echo '1';
} else if($type == 3) { //post
    if($like == 1) $query = $db->prepare("UPDATE acccomments SET likes = (likes + 1) WHERE ID = :itemID");
    else if($like == 0) $query = $db->prepare("UPDATE acccomments SET likes = (likes - 1) WHERE ID = :itemID");
    $query->execute([':itemID' => $itemID]);
    echo '1';
}