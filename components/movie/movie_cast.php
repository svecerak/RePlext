<?php $castMembers = getCrew($api, $id); ?>

    <div class="container mx-auto px-1 pt-6">
        <div class="cast-members bg-plex-background mt-2 mx-3 sm:mx-0">
            <h2 class="uppercase tracking-wider text-yellow-500 text-lg font-semibold">Cast</h2>
            <div class="grid grid-cols-3 sm:grid-cols-3 md:grid-cols-5 lg:grid-cols-9 gap-4">
            
            <?php 
                $i = 0;
                foreach($castMembers['cast'] as $cast) { 
            ?>

                <div class="mt-8 text-center">
                    <div class="w-32 h-32 rounded-full overflow-hidden mx-auto">
                        <?= "<img src='" . "https://image.tmdb.org/t/p/w500/".$cast['profile_path'] .  "'" . "class=' shadow-lg h-full w-full object-cover'" . ">" ?>            
                    </div>
                    <div class="mt-2 text-center"> 
                        <div class="text-md mt-2 hover:text-gray-300 truncate ...">
                            <?php echo $cast['name']?>
                        </div>
                        <p class="text-sm text-gray-500 hover:text-gray-600 text-center">
                            <?php echo "as " . $cast['character']?>
                        </p>
                    </div>     
                </div>
                    
            <?php if (++$i == 9) break; } ?>

        </div>
    </div> 
</div>