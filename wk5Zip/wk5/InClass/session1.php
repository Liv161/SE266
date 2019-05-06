<?php
    // Start the session
    session_start();
?>

<!DOCTYPE html>
<html>
<body>

<?php
    // Set session variables
    $_SESSION["favoriteDisneyCharacter"] = "Mickey Mouse";
    
?>
    <a href="session2.php">Go to different page</a>

</body>
</html>