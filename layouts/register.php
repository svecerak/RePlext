<?php

require 'header.php';
// require 'config.php';
require '../classes/Account.php';
require '../classes/Constants.php';

$account = new Account($mysqli);

include '../handlers/register-handler.php';
include '../handlers/login-handler.php';

?>





<div class="container mx-auto mt-16">

    <div class="flex items-center">

    <form class="shadow-lg rounded-md px-12 pt-16 pb-12 mb-4 text-black bg-white    mx-auto" method="POST"  >

            <div class="text-center font-semibold text-gray-600">
                <h1>Create your free account</h1>
            </div>

            <div class="mb-6 mt-6 divide-gray-800 "> 
                <label class="block mb-2 font-semibold text-gray-800" >Username</label>
                <input name="username" class="focus:outline-none w-full border-b pb-1 text-gray-600 focus:border-orange-600" type="text">
            </div>

            <div class="mb-6 divide-gray-800" > 
                <label class="block mb-2 font-semibold text-gray-800" >Email address</label>
                <input name="email" class="w-full focus:outline-none border-b pb-1 text-gray-600 focus:border-orange-600" type="email">
            </div>

            <div class="mb-6 divide-gray-800" > 
                <label class="block mb-2 font-semibold text-gray-800" >Confirm Email address</label>
                <input name="email2" class="w-full focus:outline-none border-b pb-1 text-gray-600 focus:border-orange-600" type="email">
            </div>
        
            <div class="mb-6 divide-gray-800" > 
                <label class="block mb-2 font-semibold text-gray-800" >Create Password</label>
                <input name="password"class="w-full focus:outline-none border-b pb-1 text-gray-600 focus:border-orange-600" type="password" placeholder="5 characters minimum">
            </div>
            <div class="mb-12 divide-gray-800" > 
                <label class="block mb-2 font-semibold text-gray-800" >Confirm Password</label>
                <input name="password2" class="w-full focus:outline-none border-b pb-1 text-gray-600 focus:border-orange-600" type="password" placeholder="5 characters minimum">
            </div>

            <div class="text-center">
                <button class=" bg-orange-500 w-full py-3 mb-4 font-semibold text-gray-200 hover:bg-orange-400 rounded rounded-md focus:outline-none"  type="submit" name="registerButton"> 
                   Create an Account
                </button>
            </div>

            <div class="text-center mb-12">  
               <span>Already have an account with us?</span>
               <a href="/tailwindcss/layouts/login.php" class="font-semibold text-gray-700 hover:text-orange-600">Sign In!</a>
            </div>

           




        </form>
    </div>
</div>