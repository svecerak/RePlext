<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Replext</title>
    <link rel="stylesheet" href="../public/tailwind.css">
    <script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
</head>

<div class="flex flex-col h-screen">
    <div class="bg-blue-500 flex-1 flex">

        <div class="sidebar bg-black w-32 flex-none text-gray-400 flex flex-col justify-between py-10">
            <div>            
                <img class="mb-10" src="../assets/images/spotify.png" alt="">
            </div>

            <ul class="text-sm text-center">
                <li class="border-l-4 border-green-500 py-5 px-3 ">
                    <a href="#" class="flex items-center  group">

                        <svg class="fill-current text-white group-hover:text-white h-6 w-6" viewBox="0 0 24 24" width="24" height="24"><path d="M13 20v-5h-2v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-7.59l-.3.3a1 1 0 11-1.4-1.42l9-9a1 1 0 011.4 0l9 9a1 1 0 01-1.4 1.42l-.3-.3V20a2 2 0 01-2 2h-3a2 2 0 01-2-2zm5 0v-9.59l-6-6-6 6V20h3v-5c0-1.1.9-2 2-2h2a2 2 0 012 2v5h3z"/></svg>
                        <span class="ml-2 text-red hover:text-white">Profile</span>
                    </a>
                </li>



                <li class="py-5 px-3">Top Artists</li>
                <li class="py-5 px-3">Top Tracks</li>
                <li class="py-5 px-3">Recent</li>
                <li class="py-5 px-3">Playlists</li>
            </ul>

            <div class="">
                <svg class="text-gray-100 mx-auto " xmlns="http://www.w3.org/2000/svg" width="32" height="32"><path d="M15.5 22.7h-.1l-.1-.1v-3.1c0-.7-.1-1.3-.4-1.8 2.3-.4 4.8-1.6 4.8-6.1 0-1.2-.4-2.3-1.1-3.2.2-.6.3-1.7-.2-3.1l-.3-.3s-.2-.1-.4-.1c-.6 0-1.5.2-3 1.2-.8-.1-1.7-.3-2.7-.3-1 0-1.9.1-2.8.3C7.8 5.2 6.8 5 6.2 5c-.2 0-.3.1-.4.1-.1 0-.3.2-.3.3-.5 1.4-.4 2.5-.2 3.1-.7.9-1.1 2-1.1 3.2 0 4.4 2.6 5.6 4.8 6.1-.1.2-.2.5-.3.8-.2.1-.5.2-.9.2s-.8-.1-1.1-.4l-.1-.1c-.1-.1-.1-.2-.2-.2l-.1-.1-.1-.1c0-.1-.8-1.3-2.2-1.4-.5 0-.9.2-1 .5-.2.5.4.9.7 1.1 0 0 .6.3 1 1.4.2.7 1.1 2 3.2 2h.7v1.4l-.1.1s-.1 0 0 0C4 21.2 1 17 1 12.3c0-6.1 4.9-11 11-11s11 4.9 11 11c0 4.7-3 8.9-7.5 10.4z"/></svg>
            </div>

        </div>




        <div class="content-area bg-plex-nav flex-1 pt-16">
            <div class="container mx-auto">

                <div class="flex flex-col text-center">

                    <span><svg class="w-32 h-32 fill-white text-white mx-auto border-2 border-white rounded-full p-4 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg></span>

                    <span class="text-center text-white font-bold mt-5 text-5xl">username</span>
                </div>
                

                <div class="flex items-center text-gray-500 uppercase text-sm mt-8">
                    <div class="flex-1 flex flex-col text-center">
                        <span class="text-green-500 text-xl font-semibold">4</span>
                        <span>Followers</span>
                    </div>
                    <div class="flex-1 flex flex-col text-center">
                        <span class="text-green-500 text-xl font-semibold">44</span>
                        <span>Following</span>
                    </div>
                    <div class="flex-1 flex flex-col text-center">
                        <span class="text-green-500 text-xl font-semibold">12</span>
                        <span>Playlists</span>
                    </div>
                </div>

                <div class="mt-16 text-center text-white uppercase font-semibold text-sm">
                    <a href="#" class="border rounded-full px-8 py-2 hover:bg-white hover:text-black">Logout</a>
                </div>

                <div class="flex items-stretch mt-32 text-gray-200 font-semibold">
                    <div class="flex-1  px-4">
                    <h1> Top Artists of All Time</h1>
                    <ul class="py-4 text-blue-300"> 
                        <li>
                            <!-- <img class="h-24 rounded-full" src="../assets/images/fnf.jpg" alt=""> -->
                            <span >Drake</span>
                        </li>
                   
                        <li>
                            <span class="mr-4">Album Image</span>
                            <span>Eminem</span>
                        </li>
                   
                        <li>
                            <span class="mr-4">Album Image</span>
                            <span>Disturbed</span>
                        </li>
                   
                    </ul>
                    </div>
                
                    <div class="flex-1  px-4">
                    Top Tracks of All Time

                    </div>


                </div>
            </div>

        </div>



    </div>
   

</div>




<?php function getArtists($api) {
      $url = "https://api.spotify.com/v1";
      $response = file_get_contents($url);
      return json_decode($response, true);
}