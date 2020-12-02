<?php $director = getDirector($api, $id); ?>
<?php $writer = getConfirmedWritingCredit($api, $id); ?>


<div class="mt-6 font-semibold text-sm">
    <div class="grid grid-cols-3 lg:grid-cols-4 justify-items-start">
        <div class="flex justify-center uppercase text-gray-400">Directed by</div>
        <div class="flex justify-center"><?php echo $director?></div>
    </div>
    <div class="grid grid-cols-3 lg:grid-cols-4 justify-items-start">
        <div class="flex justify-center uppercase text-gray-400">Written by</div>
        <div class="flex justify-center"><?php echo $writer?></div>
    </div>
</div>


