<?php 
    require 'TMDb.php';
    require 'header.php';

    $id = $_GET['id'];
    $movieDetails = getMovieDetails($api, $id); 
    $movieReviews = getMovieReviews($api, $id);
    $relatedMovies = getRelated($api, $id);
    // $castMembers = getCast($api, $id);
    $movieImages = getMovieImages($api, $id);
    // $directorName = getDirector($castMembers['crew']);
    // $verifiedWriters = confirmScreenplayWriters($castMembers['crew']);

    // Need to make a class to instantiate mysqli object
    // function checkDuplicates($id) {
    //     $check = "SELECT * FROM requests WHERE tmdb_id = '".$id."' ";
    //     $result = $mysqli->query($check);
    //     return $result->num_rows;
    // }

    $statusCode = '';

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add']) ) {
            $db_title = $movieDetails['title'];
            $db_date = $movieDetails['release_date'];
            $db_tmdbid = $id;
            $db_image = $movieDetails['poster_path'];
            $db_user = $_SESSION['userLoggedIn'] ?? '';
            $db_rating = $movieDetails['vote_average'];


            // if($db_title && $db_date && $db_tmdbid) {
            if(isset($_SESSION['userLoggedIn'])) {

                // Check database for existing entry, prevent duplicates
                $check = "SELECT * FROM requests WHERE tmdb_id = '".$db_tmdbid."' ";
                $result = $mysqli->query($check);
                $duplicates = $result->num_rows;

                // No duplicates found, Insert 
                if($duplicates == 0) {
                    $sql = 'INSERT INTO requests (image, title, release_date, tmdb_id, user, rating) VALUES (?, ?, ?, ?, ?, ?)';

                    if($stmt = $mysqli->prepare($sql)) {
                        $stmt->bind_param("ssssss", $db_image, $db_title, $db_date, $db_tmdbid, $db_user, $db_rating);
            
                        if($stmt->execute()) {
                            $new_id = $stmt->insert_id; // Retrieve id of latest insert statement 
                            $statusCode='Request added';
                            // echo json_encode(array("statusCode"=>200));
                        } else {
                            $statusCode='Request failed';
                            // echo json_encode(array("statusCode"=>201));
                        }
                    }
                
                // Change to DELETE operation
                } else {
                    $statusCode = "Already in database";
                }
            } else {
                echo '<div class="mx-auto w-64 text-center"> 
                    <h2 class="text-grey-700 bg-red-400 py-3 px-5 mt-12 rounded-md absolute font-semibold">You must log in to do that!</h2>
                </div>';
            }
    $mysqli->close();
    } 
        


?>

    <!-- <div class="mx-auto w-64 text-center"> 
        <h2 class="text-blue-700 bg-blue-200 py-3 px-5 rounded-md absolute">Log in to make requests!</h2>
    </div> -->


<!-- echo '<div class="container text-center font-semibold">You must be logged in to do that!</div>'; -->




    <div class="container mx-auto pt-12">

        <?php
            if(!empty($statusCode)) { ?>
                <div class="mx-auto w-64 text-center"> 
                    <h2 class="text-gray-700 bg-blue-300 py-3 px-5 rounded-md absolute font-semibold"><?php echo $statusCode; ?></h2>
                </div>
                
            <?php
                }
            ?>
         
           

        <?php require '../components/movie/movie_card.php' ?>

        <?php require '../components/movie/movie_reviews.php' ?>

        <?php require '../components/movie/movie_cast.php' ?>

        <?php require '../components/movie/movie_images.php' ?>

        <?php require '../components/movie/movie_related.php' ?>

    </div>
     
</body>
</html>

