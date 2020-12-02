<div class="searched-tvshows bg-plex-background py-2 mt-2 mx-3 md:mx-0">
        <h2 class="uppercase tracking-wider text-yellow-500 text-lg font-semibold">TV Shows</h2>
        <div class="grid grid-cols-3 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-10 gap-6">
    
            <?php

            if(isset($_POST['search']) &&  !empty($_POST['search'])) {

                $shows = searchTelevision($api, '/search/tv', $searchQuery);
                
                foreach($shows as $tv) {
                    if($tv['poster_path']) {
            ?>
        
            <div class="mt-8">
                        <?php 
                        // $dynamicLink = getMovieDetails($api, $tv['id']); 
                        ?>
                        <a href="view.php?id=">
                                <img src="https://image.tmdb.org/t/p/w500/<?=$tv['poster_path']?>" alt="" class="hover:opacity-75 transition ease-in-out duration-150 hover:shadow-outline rounded shadow-lg">
                        </a>
                        <div class="mt-2"> 
                            <div class="text-md mt-2 hover:text-gray-300  truncate ..">
                                <?=$tv['name']?>
                            </div>
                            <p class="text-sm text-gray-500 hover:text-gray-600">
                                <?php echo exists(substr($tv['first_air_date'], 0, 4)); ?>
                            </p>
                        </div>     
                    </div>
            
            <?php } 
            }
        }
            if(empty($shows)) echo "No Result";
            ?>
        


    </div>
</div>
