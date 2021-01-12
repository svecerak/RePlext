<?php require 'header.php';

$currentUser = $_SESSION['userLoggedIn'] ?? '';

?>



<div class="container mx-auto mt-16 px-8 md:px-0">
    <!-- <div class="flex items-center block"> -->
        <div class="block font-semibold text-2xl text-gray-100">
            <h1>Account Details</h1>
        </div>

        <div class="block mt-3">
            <h1 class="text-gray-400 text-sm">Username</h1>

            <span><?php echo $currentUser ?></span>

        </div>

        <div class="block mt-2">
            <h1 class="text-gray-400 text-sm">Password</h1>
            <span>*******</span>
            <span class="text-sm text-green-400">edit</span>

        </div>

        <?php 


 

        $query = "SELECT email FROM users WHERE username = '".$currentUser."' LIMIT 1";
        $stmt = $mysqli->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        $temp='';
        while($row = $result->fetch_assoc()) {
            $temp = $row['email'];
        }

        ?>

        <div class="block mt-2">
            <h1 class="text-gray-400 text-sm">Email</h1>
            <span><?php echo $temp ?></span>
            <span class="text-sm text-green-400">edit</span>

        </div>
  

    
    <!-- </div> -->

</div>