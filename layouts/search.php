<?php 
    require 'TMDb.php';
    require 'header.php';

    // if(isset($_POST['search']) && !empty($_POST['search'])) {
    //     $searchQuery = urlencode($_POST['search']);
    // } else {
    //     $searchQuery = '';
    // }

    $searchQuery = getSearchQueryResults($_POST['search'])

?>


<div class="container mx-auto px-1 pt-6">
    <h2 class="tracking-wider text-gray-400 text-lg font-semibold mt-6 ml-3 md:ml-0">Result(s) for '<?php getInputValue($searchQuery)?>'</h2>

    <?php include '../components/movie/movie_search.php' ?>

    <?php include '../components/tvshows/tv_search.php' ?>
    
</div>
 
