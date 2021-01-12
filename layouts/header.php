<?php 
    require 'config.php'; 
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Replext</title>
    <link rel="stylesheet" href="../public/tailwind.css">
    <script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
</head>

<body class="font-sans bg-gradient-to-r from-gray-900 via-gray-900 to-gray-800 text-white overflow-x-hidden">
   
    <nav class="bg-gray-900 border-b border-gray-800">

        <!-- <div class="container mx-auto flex items-center justify-between px-1 py-3"> -->
        <div class="container mx-auto flex flex-col md:flex-row items-center justify-between py-6">


            <!-- DIVIDER ONE -->
            <ul class="flex flex-col md:flex-row items-center">
            <!-- flex flex-col md:flex-row items-center -->
                <li class="ml-6 md:ml-0">
                    <a href="./index.php#"> 
                        <img src="../assets/images/whiteplex.png" class="w-16" alt="">
                    </a>
                </li>
                <li class="ml-6 md:ml-16 mt-1">
                    <a href="index.php" class="hidden md:block hover:text-gray-300 font-semibold">Movies</a>
                </li>
                <li class="ml-6 mt-1">
                    <a href="tvshows.php" class="hidden md:block hover:text-gray-300 font-semibold">TV Shows</a>
                </li>
                <li class="ml-6 mt-1">   
                    <a href="requests.php?sort=DESC" class="hover:text-gray-300 font-semibold">Requests</a>
                </li>
            </ul>


            <!-- DIVIDER TWO -->

            <div class="flex flex-col md:flex-row items-center">
                
                <form method="POST" action="search.php">
                    <div class="relative">
                        <input type="text" class="bg-gray-800 rounded w-64 px-4 py-2 pl-8 focus:bg-gray-300 focus:outline-none focus:shadow-outline placeholder-current text-white focus:text-black hover:shadow-lg" name="search" placeholder="Search">
                        <div class="absolute top-0">

                            <!-- <img src="../assets/images/search2.png" class="fill-current text-gray-500 w-4 mt-3 ml-2" alt="">  -->

                            <svg  class="w-4 mt-3 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>

                        </div>
                    </div>
                </form>
             

                <div class="ml-8 ">
                    <?php 
                    if(isset($_SESSION['userLoggedIn'])) { 
                        
                        echo  '<form action="logout.php" method="POST">
                            <button class="bg-teal-600 rounded-md px-3 py-1 mt-2 md:mt-0 hidden md:inline-block text-gray-400 font-semibold uppercase hover:text-gray-200 focus:outline-rounded" type="submit" name="logoutButton">Sign Out</button>    
                        </form>';
                    } else {
                        echo ' <a class=" px-3 py-2 hidden md:inline-block text-center font-semibold uppercase text-gray-400 hover:text-gray-200" href="login.php">
                        Sign in
                        </a>';
                        echo '<a class="bg-orange-600 rounded-md px-3 py-1 hidden md:inline-block text-gray-400 font-semibold uppercase hover:text-gray-200" href="register.php">
                            Sign up
                        </a>';
                    } 
                    ?>
                </div>

                <div class="hidden md:block navbar-divider mx-4 w-01 h-10 bg-gray-700"> </div>
        
                <!-- <div class="navbar-divider mx-4 w-01 h-10 bg-gray-700      "> </div> -->

                <a class="focus:outline-none hidden md:block" href="user.php" >
                    <div class="relative"> 
                        <!-- <a href="" class=""> -->
                        <img src="../assets/images/genericprofile.png" class="rounded-full w-10 h-10 border border-gray-700" alt="">                        
                        <!-- </a> -->
                        <div class="absolute top-0">
                            <!-- <svg class="text-gray-500 h-4 w-4 mt-3 ml-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/></svg> -->
                        </div>
                    </div>   
                </a>

                <!-- START of dropdown menu -->
                <?php $currentUser = $_SESSION['userLoggedIn'] ?? 'Log In'; ?>
                <div class="relative hidden">
                    <div class="absolute right-0 w-48 bg-gray-300 text-black rounded-lg py-2 shadow-xl mt-6 ">
                        <div class="block px-4 py-2 text-gray-900  uppercase font-bold border-b border-gray-400" ><?php echo $currentUser?></div>
                        <a class="block px-4 py-2 text-gray-800 hover:bg-gray-600 hover:text-white font-semibold" href="user.php">Account</a>
                        <a class="block px-4 py-2 text-gray-800 hover:bg-gray-600 hover:text-white font-semibold" href="">Settings</a>
                        <a class="block px-4 py-2 text-gray-800 hover:bg-gray-600 hover:text-white font-semibold" href="">Logout</a>
                    </div>
                </div>  
                <!-- END of dropdown menu -->

            </div>
        </div>
    </nav>