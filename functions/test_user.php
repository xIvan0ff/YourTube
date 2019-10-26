

    <!-- THIS FILE WILL BE REMOVED WHEN USER CLASS IS FINISHED -->
<script>console.log("This file is for test purposes only")</script>

<?php
    include("User.php");

    $user = new User("adminstrators", "passwords", "adminstrators@adminstrators.com");

    echo $user->create() ? 'true' : 'false';
    echo $user->getErrors();
?>