<?php 
    require 'TMDb.php'; 
    require_once 'header.php';
?>


    <div class="container mx-auto px-1 pt-8">

    
        <!--START OF 'POPULAR' SECTION -->
        <div class="popular-movies bg-plex-background rounded-lg py-2 mt-12 mx-3 md:mx-0 lg:mx-0">
            <h2 class="uppercase tracking-wider text-yellow-500 text-lg font-semibold">What's Popular</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-8">
        
                <?php 
                    $popularMovies = getMovieLists($api, $popular);

                    $i = 0;
                    foreach($popularMovies as $movie):
                        $id = $movie['id'];
                ?>
                
                    <div class="mt-8">
                        <a href="view.php?id=<?php echo $id?>">
                            <?php echo "<img src='" . "https://image.tmdb.org/t/p/w500/".$movie['poster_path'] .  "'" . "class='hover:opacity-75 transition ease-in-out duration-150 rounded-lg hover:shadow-outline shadow-xl'" . ">" ?>            
                        </a>
                        <div class="mt-2"> 
                            <a href="" class="text-lg mt-2 hover:text-gray-300">
                                <?php echo $movie['title']?>
                            </a>

                            <div class="flex items-center text-gray-400 mt-2">
                                <span class="w-4 mr-1"><img src="../assets/images/star.png" alt="Stars"></span>
                                <span class="ml-1"><?= hasRating($movie['vote_average'])?></span>
                                <span class="mx-2">|</span>
                                <span ><?=$movie['release_date'] ?></span>
                            </div>

                            <div class="text-gray-400 text-sm">
                                Action, Fantasy
                            </div>
                        
                        </div>     
                    </div>
                    
                <?php if (++$i == 10) break;  ?>
                <?php endforeach ?>


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
                
            
  
                <!--  -->

            </div>
        </div> 
        <!--END OF 'POPULAR' SECTION -->




        <!--START OF 'NOW PLAYING' SECTION -->
        <div class="now-playing bg-plex-background rounded-lg mt-12 mx-3 md:mx-0 lg:mx-0"> 
            <h2 class="uppercase tracking-wider text-yellow-500 text-lg font-semibold">Now Playing</h2>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-8 gap-8">



                    <?php
                        $nowPlayingMovies = getMovieLists($api, $nowPlaying);

                        $i=0;
                        foreach($nowPlayingMovies as $movie):
                    ?>
                
                    <div class="mt-8">
                        <a href="view.php?id=<?=$movie['id']?>">
                            <?= "<img src='" . "https://image.tmdb.org/t/p/w500/".$movie['poster_path'] .  "'" . "class='hover:opacity-75 transition ease-in-out duration-150 rounded-lg hover:shadow-outline rounded-lg'" . ">" ?>
                        </a>
                        <div class="mt-2"> 
                            <div class="flex items-center text-gray-400 mt-2">
                                <!-- <span class="w-4 mr-1"><img src="../assets/images/star.png" alt=""></span>
                                <span class="ml-1"><?= hasRating($movie['vote_average'])?></span> -->
                                <?php echo $movie['title'] . " (" . substr($movie['release_date'], 0, 4) . ")" ?>
                            </div>
                        </div>    
                     
                    </div>

                    <?php if (++$i == 8) break; ?>
                    <?php endforeach ?>

                </div> 
        </div>
        <!--END OF 'NOW PLAYING' SECTION -->




        <!--START OF 'COMING SOON' SECTION -->
        <div class="coming-soon bg-plex-background rounded-lg mt-12 mx-3 md:mx-0 lg:mx-0"> 
            <h2 class="uppercase tracking-wider text-yellow-500 text-lg font-semibold">Coming Soon</h2>
                <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-6 lg:grid-cols-8 gap-8">

                    <?php
                        $upcomingMovies = getMovieLists($api, $upcoming);

                        $i=0;
                        foreach($upcomingMovies as $movie):
                            $id = $movie['id'];
                    ?>
                
                    <div class="mt-8">
                    <a href="view.php?id=<?php echo $id?>">
                            <?= "<img src='" . "https://image.tmdb.org/t/p/w500/".$movie['poster_path'] .  "'" . "class='hover:opacity-75 transition ease-in-out duration-150 rounded-lg hover:shadow-outline rounded-lg'" . ">" ?>
                        </a>
                        <div class="mt-2"> 
                            <div class="flex items-center text-gray-400 mt-2">
                                <!-- <span class="w-4 mr-1"><img src="../assets/images/star.png" alt=""></span>
                                <span class="ml-1"><?= hasRating($movie['vote_average'])?></span> -->
                                <?php echo $movie['title'] . " (" . substr($movie['release_date'], 0, 4) . ")" ?>
                            </div>
                        </div>     
                    </div>

                    <?php if (++$i == 8) break; ?>
                    <?php endforeach ?>

                </div> 
        </div>
        <!--END OF COMING SOON SECTION -->


    </div>
</body>

<?php include 'footer.php'; ?>

</html>