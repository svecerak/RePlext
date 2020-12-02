<div class="movie-search bg-plex-background py-2 mt-6 mx-3 md:mx-0">
    <h2 class="uppercase tracking-wider text-yellow-500 text-lg font-semibold">Movies</h2>
    <div class="grid grid-cols-3 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-10 gap-6">

        <?php

        // function isValidSearchQuery($api, $key, $searchQuery) {
        //     if(isset($key) &&  !empty($key)) {
        //         $movies = searchMovie($api, $searchQuery);
        //     }
        //     return $movies;
        // }


            if(isset($_POST['search']) &&  !empty($_POST['search'])) {
                $movies = searchMovie($api, $searchQuery);

                foreach($movies as $movie) {
        ?>
    
        <div class="mt-8">
            <?php $dynamicLink = getMovieDetails($api, $movie['id']); ?>

            <a href="view.php?id=<?=$dynamicLink['id']?>">

            <?php if($movie['poster_path']) { ?>
                    <img src="https://image.tmdb.org/t/p/w500/<?php echo $movie['poster_path']?>" alt="" class="hover:opacity-75 transition ease-in-out duration-150 hover:shadow-outline rounded shadow-lg">
                <?php } else { ?>
                    <img src="https://critics.io/img/movies/poster-placeholder.png" alt="Generic">
                <?php } ?>

            </a>
            <div class="mt-2"> 
                <div class="text-md mt-2 hover:text-gray-300  truncate ..">
                    <?php echo $movie['title']?>
                </div>
                <p class="text-sm text-gray-500 hover:text-gray-600">
                    <?php echo exists(substr($movie['release_date'], 0, 4)); ?>
                </p>
            </div>     
        </div>

                <?php }  
                }

                if(empty($movies)) echo "No Result";
                ?>
    
    </div>
</div>