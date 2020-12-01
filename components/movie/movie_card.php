
<div class="movie-info border-b border-gray-800">
    <div class="container mx-auto py-16 flex flex-row">
    
        <!-- <div class=""> -->
            <img src="https://image.tmdb.org/t/p/w500/<?=$movieDetails['poster_path']?>" class='w-64 shadow-xl rounded-md object-scale-down '>
        <!-- </div> -->



        <div class="ml-16">
            <h1 class="text-2xl font-semibold"><?=$movieDetails['title']?></h1>

            <h2 class="text-md font-semibold mt-2">
                <?php echo substr($movieDetails['release_date'], 0, 4); ?>
            </h2>

            <div class="flex items-center text-gray-400 mt-2 ">

                <div class="text-md mr-12 font-semibold mt-1"><?=$movieDetails['runtime'] . " min" ?></div>
                <!-- <span class="w-4 mr-1"><img src="../images/star.png" alt=""></span> -->
                <div class="text-md mr-12 font-semibold mt-1 ">
                    <button><img src="../assets/images/imdb.png" alt="" class="w-8"></button>
                    <span class="text-md"><?=$movieDetails['vote_average']?></span>
                </div>
                <!-- <span class="mx-2 text-sm">|</span> -->
            </div>
            <!-- <div class="mt-5">
                <button><img src="../images/imdb.png" alt="" class="w-10"></button>
            </div> -->
            <div class="mt-12 flex">
                <button class="flex items-center bg-yellow-600 text-gray-900 rounded font-semibold px-2 py-1 hover:bg-yellow-500 hover:shadow-lg transition ease-in-out duration-350 focus:outline-none">
                    <img src="../assets/images/play.png" alt="" class="w-3 mx-2">
                    <span>Play Trailer</span>
                </button>
                   
                <form method="POST">
                    <button name="add" class="items-center ml-4 bg-gray-500 text-gray-900 rounded font-semibold transition ease-in-out duration-150 hover:bg-gray-400 hover:shadow-xl focus:outline-none transition ease-in-out duration-350 px-2 py-2"    id="butsave">
                        <img src="../assets/images/plus.png" alt="" class="w-4 mx-1" id="plus">
                        <!-- <svg class="w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg> -->
                    </button>
                </form>

                <?php  
                    $temp_id = $movieDetails['id']; 
                    $temp_title = $movieDetails['title'];
                    $temp_date = $movieDetails['release_date'];
                    $temp_image = $movieDetails['poster_path'];
                ?>
            </div>

            <div>
                <h4 class="mt-8">
                    <?php echo $movieDetails['overview']?>
                </h4>
            </div>

            <?php include 'movie_crew.php' ?>



        </div>

    </div>
</div>



