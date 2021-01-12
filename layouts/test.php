<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Replext</title>
    <link rel="stylesheet" href="../public/tailwind.css">
</head>
<body class="font-sans bg-plex-nav text-white">
   
    <nav class="bg-plex-nav border-b border-gray-800">

        <div class="container mx-auto flex items-center justify-between px-4 py-3">

            <ul class="flex items-center ">
                <li>
                    <a href="#"> 
                        <img src="../images/whiteplex.png" class="w-16" alt="">
                    </a>
                </li>
                <li class="ml-16">
                    <a href="#" class="hover:text-gray-300">Movies</a>
                </li>
                <li class="ml-6">
                    <a href="#" class="hover:text-gray-300">TV Shows</a>
                </li>
                <li class="ml-6">   
                    <a href="#" class="hover:text-gray-300">Actors</a>
                </li>
            </ul>

            <div class="flex items-center">
                <div class="relative">
                    <input type="text" class="bg-plex-search rounded w-widest px-4 py-2 pl-8 focus:bg-white  focus:outline-none focus:shadow-outline placeholder-current text-white focus:text-black">
                    <div class="absolute top-0">
                        <img src="../images/search2.png" class="fill-current text-gray-500 w-4 mt-3 ml-2" alt=""> 
                    </div>
                </div>

                <div class="ml-8">
                    <a href="">
                        <img src="../images/me.jpg" class="rounded-full w-10 h-10 border border-gray-700" alt="">
                    </a>
                </div>

            </div>
        </div>
    </nav>

    <div class="container mx-auto px-4 pt-16">
        <div class="popular-movies">
            <h2 class="uppercase tracking-wider text-yellow-500 text-lg font-semibold">Popular Movies</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-8">
          


            <?php 
                include 'show.blade.php';

            for($i = 0; $i < 12; $i++) {
                $posterPath = $popularMovies['results'][$i]['poster_path'];
                $titlePoster = 'https://image.tmdb.org/t/p/w500/' . $posterPath;
                $titleName = $popularMovies['results'][$i]['title'];
                $titleRating = $popularMovies['results'][$i]['vote_average'];
                $titleYear = $popularMovies['results'][$i]['release_date'];


             
                // echo "https://image.tmdb.org/t/p/w500/$"
                // echo "<img src='" . $titlePoster . "'>" . $titleName . ", " . $titleYear . "</br>";
            


            ?>
             
            <div class="mt-8">
                    <a href="#">
                        <!-- <img src="../images/SWEPI.jpg" class="hover:opacity-75 transition ease-in-out duration-150 rounded-lg hover:shadow-outline " alt=""> -->
                        <?= "<img src='" . $titlePoster .  "'" . "class='hover:opacity-75 transition ease-in-out duration-150 rounded-lg hover:shadow-outline rounded-lg'" . ">" ?>
                      
                    </a>
                    <div class="mt-2"> 
                        <a href="#" class="text-lg mt-2 hover:text-gray-300"><?=$titleName?></a>


                        <div class="flex items-center text-gray-400 mt-2">
                            <span class="w-4 mr-1"><img src="../images/star.png" alt=""></span>
                            <span class="ml-1"><?= hasRating($titleRating)?></span>
                            <span class="mx-2">|</span>
                            <span ><?=$titleYear ?></span>
                        </div>
                        <div class="text-gray-400 text-sm">
                            Action, Fantasy
                        </div>
                    </div>     
                </div>


            <?php } ?>


                <!-- <div class="mt-8">
                    <a href="#">
                        <img src="../images/BW.jpg" class="rounded-lg" alt="">
                    </a>
                    <div class="mt-2"> 
                        <a href="#" class="text-lg mt-2 hover:text-gray-300">Black Widow</a>


                        <div class="flex items-center text-gray-400 mt-2">
                            <span class="w-4 mr-1"><img src="../images/star.png" alt=""></span>
                            <span class="ml-1">5.9</span>
                            <span class="mx-2">|</span>
                            <span>1986</span>
                        </div>
                        <div class="text-gray-400">
                            Action
                        </div>
                    </div>     
                </div>






                <div class="mt-8">
                    <a href="#">
                        <img src="../images/QP2.jpg" class="mb-2" alt="">Quiet Place: Part II
                    </a>
                    <div class="flex items-center text-gray-400 mt-2">
                        <span class="w-4 mr-1"><img src="../images/star.png" alt=""></span>
                        <span class="ml-1">7.0</span>
                        <span class="mx-2">|</span>
                        <span>1986</span>
                    </div>
                    <div class="text-gray-400">
                        Thriller, Horror
                    </div>
                </div>
                
                <div class="mt-8">
                    <a href="#">
                        <img src="../images/joker.jpg" class="mb-2" alt="">Joker
                    </a>
                    <div class="flex items-center text-gray-400 mt-2">
                        <span class="w-4 mr-1"><img src="../images/star.png" alt=""></span>
                        <span class="ml-1">7.9</span>
                        <span class="mx-2">|</span>
                        <span>1986</span>
                    </div>
                    <div class="text-gray-400">
                        Action, Thriller
                    </div>
                </div> -->
                
                <!-- <div class="mt-8">
                    <a href="#">
                        <img src="../images/JBNTTD.jpg" class="mb-2" alt="">No Time To Die
                    </a>
                    <div class="flex items-center text-gray-400 mt-2">
                        <span class="w-4 mr-1"><img src="../images/star.png" alt=""></span>
                        <span class="ml-1">7.5</span>
                        <span class="mx-2">|</span>
                        <span>1986</span>
                    </div>
                    <div class="text-gray-400">
                        Action, Thriller, Comedy
                    </div>
                </div>
                
                <div class="mt-8">
                    <a href="#">
                        <img src="../images/JP.jpg" class="mb-2" alt="">Jurrasic Park
                    </a>
                    <div class="flex items-center text-gray-400 mt-2">
                        <span class="w-4 mr-1"><img src="../images/star.png" alt=""></span>
                        <span class="ml-1">7.9</span>
                        <span class="mx-2">|</span>
                        <span>1986</span>
                    </div>
                    <div class="text-gray-400">
                        Action, Thriller, Comedy
                    </div>
                </div> -->

            </div>
        </div>

        <div class="now-playing">
            <h2 class="uppercase tracking-wider text-yellow-500 text-lg font-semibold mt-12">Now Playing</h2>
                <div class="grid grid-cols-10 gap-8">

                    <?php
                         for($i = 0; $i < 10; $i++) {
                            $posterPath = $nowPlayingMovies['results'][$i]['poster_path'];
                            $titlePoster = 'https://image.tmdb.org/t/p/w500/' . $posterPath;
                            $titleName = $nowPlayingMovies['results'][$i]['title'];
                            $titleRating = $nowPlayingMovies['results'][$i]['vote_average'];
                            $titleYear = $nowPlayingMovies['results'][$i]['release_date'];
                    ?>

                    <div class="mt-8">
                        <a href="#">
                            
                            <?= "<img src='" . $titlePoster .  "'" . "class='hover:opacity-75 transition ease-in-out duration-150 rounded-lg hover:shadow-outline rounded-lg'" . ">" ?><?=$titleRating?>
                        </a>
                    </div>

                    <?php } ?>
                    
                    <!-- <div class="mt-8">
                        <a href="#">
                            <img src="../images/FNF.jpg" alt="">
                        </a>
                    </div>

                    <div class="mt-8">
                        <a href="#">
                            <img src="../images/TG.jpg" alt="">
                        </a>
                    </div>

                    <div class="mt-8">
                        <a href="#">
                            <img src="../images/tenet.jpg" alt="">
                        </a>
                    </div>

                    <div class="mt-8">
                        <a href="#">
                            <img src="../images/RLA.jpg" alt="">
                        </a>
                    </div>

                    <div class="mt-8">
                        <a href="#">
                            <img src="../images/PF.jpg" alt="">
                        </a>
                    </div>

                    <div class="mt-8">
                        <a href="#">
                            <img src="../images/PF.jpg" alt="">
                        </a>
                    </div>

                    <div class="mt-8">
                        <a href="#">
                            <img src="../images/PF.jpg" alt="">
                        </a>
                    </div> -->
            </div>
        </div>



      


         <?php include 'requests.php' ?>                   
       


    </div>


</body>
</html>