<div class="container mx-auto px-1 pt-6">
        <div class="related-movies bg-plex-background py-2 mt-2 mx-3 md:mx-0">
            <h2 class="uppercase tracking-wider text-yellow-500 text-lg font-semibold">You Might Also Like</h2>
            <div class="grid grid-cols-3 sm:grid-cols-3 md:grid-cols-5 lg:grid-cols-9 gap-6">
            
                <?php 
                $i = 0;
                foreach($relatedMovies['results'] as $movie) { 
                ?>
            
                <div class="mt-8">

                    <?php $dynamicLink = getMovieDetails($api, $movie['id']); ?>
                    
                    <a href="view.php?id=<?=$dynamicLink['id']?>">
                        <?= "<img src='" . "https://image.tmdb.org/t/p/w500/".$movie['poster_path'] .  "'" . "class='hover:opacity-75 transition ease-in-out duration-150 hover:shadow-outline rounded shadow-lg'" . ">" ?>            
                    </a>
                    <div class="mt-2"> 

                        <div class="text-md mt-2 hover:text-gray-300  truncate ..">
                            <?=$movie['title']?>
                        </div>

                        <p class="text-sm text-gray-500 hover:text-gray-600">
                            
                            <?php 
                            
                            if($movie['release_date']) {
                                echo substr($movie['release_date'], 0, 4);
                            } else {
                                echo 'N/A';
                            }

                            ?>

                        </p>
                    </div>     
                </div>
                    
                <?php if (++$i == 9) break; } ?>

            </div>
        </div> 

    </div>