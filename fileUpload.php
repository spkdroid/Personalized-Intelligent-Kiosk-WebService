
<?php
echo $_FILES['image']['name'] . '<br/>';
// This is used to upload the profile picture to the server
// All the picture are stored in the server in teh folder named /uploads/
$target_path = "uploads/";
$target_path = $target_path . basename($_FILES['image']['name']);
try {
    //throw exception if can't move the file
    if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
        throw new Exception('Could not move file');
    }
    echo "The file " . basename($_FILES['image']['name']) .
    " has been uploaded";
} catch (Exception $e) {
    die('File did not upload: ' . $e->getMessage());
}
?>
