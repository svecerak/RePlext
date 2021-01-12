<?php 

require 'header.php' ;
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
                Login Here
            </div>
            <div class="mb-6 mt-6 divide-gray-800  "> 
                <label class="block mb-2 font-semibold text-gray-800" >Username</label>
                <input name="loginUsername" class="focus:outline-none w-full border-b pb-1 text-gray-600 focus:border-orange-600" type="text">
            </div>

            <div class="mb-12 divide-gray-800" > 
                <label class="block mb-2 font-semibold text-gray-800" >Password</label>
                <input name="loginPassword" class="w-full focus:outline-none border-b pb-1 text-gray-600 focus:border-orange-600" type="password">
                <p style="color:red;"><?php echo $account->getError(Constants::$loginFailed); ?></p>
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
 
