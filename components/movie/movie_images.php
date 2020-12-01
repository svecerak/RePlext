<div class="container mx-auto px-1 pt-6">
    <div class="cast-members bg-plex-background py-2 mt-2 mx-3 md:mx-0">
        <h2 class="uppercase tracking-wider text-yellow-500 text-lg font-semibold">Media</h2>
        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        
            <?php 
            $i = 0;
            foreach($movieImages['backdrops'] as $movie) { 
            ?>
            
                <div class="mt-8 ">
                    <a href="">
                        <?= "<img src='" . "https://image.tmdb.org/t/p/w500/".$movie['file_path'] .  "'" . "class=' w-full hover:opacity-75 transition ease-in-out duration-150 object-fill'" . ">" ?>            
                    </a>
                </div>
                
            <?php if (++$i == 3) break; } ?>

        </div>
    </div> 
</div>