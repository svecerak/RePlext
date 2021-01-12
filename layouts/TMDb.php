<?php 

require_once "../vendor/autoload.php";
require_once 'API_key.php';

use GuzzleHttp\Client;

$client = new Client([
    'base_uri' => 'https://api.themoviedb.org/3/'
]);
  



$base_url = 'https://api.themoviedb.org/3';

// Movie List endpoints
$popular = '/movie/popular';
$nowPlaying = '/movie/now_playing';
$upcoming = '/movie/upcoming';
$latest = '/movie/latest';
$topRated = '/movie/top_rated';


$trending = '/trending/movie/day';
$multiSearch = '/search/multi';
// <------------------------------> 
    

$trendingMovies = getMovieLists($api, $trending);



// To do later
function matchFound($title, $mysqli) {

    $sql = "SELECT * FROM requests WHERE title=$title";

    $query = $mysqli->query($sql);
}


//Helper Function
function exists($key) {
    $temp = 'N/A BRO';

    if($key != null) {
        return $key;
    // } elseif($key == 0) {
    //     return $temp;
    } else {
        return $temp;
    }
}

//Helper Function
function getInputValue($name) {
    if(isset($name)) {
        // $result = htmlspecialchars($name);
        echo htmlspecialchars(urldecode($name));
    }
}


 


function searchMovie($client, $api, $query) {
    $response = $client->request('GET', "search/movie?api_key={$api}&language=en-US&query={$query}&page=1");
    $body = $response->getBody();
    $results = json_decode($body, true);

    $movieArray = [];
        foreach($results['results'] as $result) {
            $movieArray[] = $result;
        }
        return $movieArray;
}


// function searchMovie($api, $query) {
//     $url = "https://api.themoviedb.org/3/search/movie?api_key={$api}&language=en-US&query={$query}&page=1";
//     $results = getJson($url);

//     $movieArray = [];
//     foreach($results['results'] as $result) {
//         $movieArray[] = $result;
//     }
//     return $movieArray;
// }

/* Can just use this function, and specify path in respective php file */
function searchTelevision($api, $path, $query) {
    $url = "https://api.themoviedb.org/3{$path}?api_key={$api}&language=en-US&query={$query}&page=1";
    $results = getJson($url);

    $tvArray = [];
    foreach($results['results'] as $result) {
        $tvArray[] = $result;
    }
    return $tvArray;
}




/** This is for returning Result(s) string on search page
 * 
 */
function getSearchQueryResults($key) {
    if(isset($key) && !empty($key)) {
        $searchQuery = urlencode($key);
    } else {
        $searchQuery = '';
    }
    return $searchQuery;
}


// ------------------------------------------------------------------- //

function getMultiSearch($api, $id, $searchQuery) {
    $url = "https://api.themoviedb.org/3{$id}?api_key={$api}&language=en-US&query={$searchQuery}&page=1";
    return getJson($url);
}

function getMultiSearchData($api, $id, $searchQuery) {
    $results = getMultiSearch($api, $id, $searchQuery);

    $movie_array = [];
    $tv_array = [];

    foreach($results['results'] as $result) {
        if($result['media_type'] == "movie") {
            $movie_array[] = $result;;
        } else {
            $tv_array[] = $result;;
        }
    }
}

// ------------------------------------------------------------------- //
function getCrew($api, $id) {
    $url = "https://api.themoviedb.org/3/movie/{$id}/credits?api_key={$api}&language=en-US";
    return getJson($url);
}

function getDirector($api, $id) {
    $crewMembers = getCrew($api, $id);
    $directors = [];

    foreach($crewMembers['crew'] as $crew) { 
        if($crew['job'] === "Director") {
            $directors[] = $crew['name'];
        }
    }
    return implode(", ", $directors);
}

function getWriter($api, $id) {
    $crewMembers = getCrew($api, $id);
    $writers = [];

    foreach($crewMembers['crew'] as $crew) { 
        if($crew['job'] == "Writer") {
            $writers[] = $crew['name'];
        }
    }
    return implode(", ", $writers);
}

function getScreenplay($api, $id) {
    $crewMembers = getCrew($api, $id);
    $writers = [];

    foreach($crewMembers['crew'] as $crew) { 
        if($crew['job'] == "Screenplay") {
            $writers[] = $crew['name'];
        }
    }
    return implode(", ", $writers);
}

/** Writing credits found either under 'Screenplay' key, or'Writer' key. Sometimes only one exists, sometimes both, sometimes neither.
 */
function getConfirmedWritingCredit($api, $id) {
    $writers = getWriter($api, $id);
    $screenplay = getScreenplay($api, $id);

    if(empty($writers)) {
        return $screenplay;
    } elseif(empty($screenplay)) {
        return $writers;
    } else {
        return 'N/A';
    }
}
   
  

/**
 * Get the primary information about a movie.
 * https://developers.themoviedb.org/3/movies
 * 
 * @param string $api key.
 * @param string The uri Get Request.
 * 
 * @return array The JSON data in array format. 
 */
function getMovieLists($api, $path) {
    $url = "https://api.themoviedb.org/3{$path}?api_key={$api}&language=en-US&page=1";
    $result = getJson($url);
    return $result['results'];
}

// --- END OF BEST WAY TO DO IT

function getMovieDetails($api, $id) {
    $url = "https://api.themoviedb.org/3/movie/{$id}?api_key={$api}&language=en-US";
    return getJson($url);
}

function getMovieReviews($api, $id) {
    $url = "https://api.themoviedb.org/3/movie/{$id}/reviews?api_key={$api}&language=en-US";
    return getJson($url);

}



function getRelated($api, $id) {
    $url = "https://api.themoviedb.org/3/movie/{$id}/recommendations?api_key={$api}&language=en-US";
    return getJson($url);

}

function getMovieImages($api, $id) {
    $url = "https://api.themoviedb.org/3/movie/{$id}/images?api_key={$api}";
    return getJson($url);
}




















// <--- Start of Endpoints --->

function getPopular($base, $popular, $api) {
    $temp = "{$base}{$popular}?api_key={$api}&language=en-US&page=1";
    return getJson($temp);

}

function getUpcoming($base, $upcoming, $api) {
    return "{$base}{$upcoming}?api_key={$api}&language=en-US&page=1";
}

function getNowPlaying($base, $nowPlaying, $api) {
    return "{$base}{$nowPlaying}?api_key={$api}&language=en-US&page=1";
}

// <--- End of Endpoints --->


// $maps_json = file_get_contents($url);
// $maps_array = json_decode($maps_json, true);

function getJson($url) {
    $maps_json = file_get_contents($url);
    return json_decode($maps_json, true);
}


function hasRating($value) {
    if($value==0) {
        return "TBD";
    }
    return $value;
}

?>