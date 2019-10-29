

    <!-- THIS FILE WILL BE REMOVED WHEN USER CLASS IS FINISHED -->


<script>console.log("This file is for test purposes only")</script>

<?php
    include("User.php");

    $user = new User("adminstrators3", "passwords3", "adminstrators3@adminstrators3.com");

    echo $user->create() ? 'true' : 'false';
    echo $user->getErrors();
?>