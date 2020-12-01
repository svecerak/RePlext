<?php 


require 'header.php' ;
// require 'config.php';
require '../classes/Account.php';
require '../classes/Constants.php';

$account = new Account($mysqli);

include '../handlers/register-handler.php';
include '../handlers/login-handler.php';


?>


<!-- <div class="container mx-auto mt-16"> 
    <body class="font-sans bg-plex-nav text-white">    
            <div class="w-3/4 max-w-xs mx-auto">
                <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="username"> Username  </label>

                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Username">
                    </div>




                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            Password
                        </label>
                        <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="*********">
                        <p class="text-red-500 text-xs italic">Please choose a password.</p>
                    </div>

                    <div class="flex items-center justify-between">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                            Sign In
                        </button>
                        <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
                            Forgot Password?
                        </a>
                    </div>

                </form>
              
            </div>
    </body>
</div> -->




<div class="container mx-auto mt-16">

    <div class="flex items-center">
   
        <form class="shadow-lg rounded-md px-12 pt-16 pb-12 mb-4 text-black bg-white    mx-auto" method="POST"  >

            <div class="text-center font-semibold text-gray-600">
                Login Here
            </div>

            <div class="mb-6 mt-6 divide-gray-800  "> 
                <label class="block mb-2 font-semibold text-gray-800" >Username</label>
                <input name="loginUsername" class="focus:outline-none w-full border-b pb-1 text-gray-600 focus:border-orange-600" type="text">
            </div>

            <div class="mb-12 divide-gray-800" > 
                <label class="block mb-2 font-semibold text-gray-800" >Password</label>
                <input name="loginPassword" class="w-full focus:outline-none border-b pb-1 text-gray-600 focus:border-orange-600" type="password">
            </div>

            <div class="text-center">
                <button class=" bg-orange-500 w-full py-3 mb-4 font-semibold text-gray-200 hover:bg-orange-400 rounded rounded-md shadow-md focus:outline-none" type="submit" name="loginButton"> 
                    <span>Sign In</span>
                </button>

                <div>
                    <span class="text-gray-700">Don't have an account yet?</span>
                    <a href="/tailwindcss/layouts/register.php" class="text-gray-700 font-semibold hover:text-orange-600">Register here!</a>
                </div>
            </div>




        </form>
    </div>
</div>




        <!-- <form class="border-b-2 border-red-900 focus-within:border-teal-500" > -->

 
