<?php 
    require 'header.php';
    // require 'config.php';
?>

<?php
    $offset = 20;
    $sort = $_GET['sort'];
    // $sort = 'asc'/'desc';
    
    $query = 'SELECT * FROM requests ORDER BY id  '. $sort .' LIMIT '.$offset .'    ';
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
?>

<div class="container mx-auto mt-12">

    <h2 class="uppercase tracking-wider text-yellow-500 text-lg font-semibold">Requests</h2>
    <h5 class="text-md text-gray-200 font-semibold mt-6"><?= $result->num_rows?> requests currently pending...</h2>


    <div class="tab text-center outline-white">
        <button class="tablinks  outline-blue" onclick="openCity(event, 'London')">Pending</button>
        <button class="tablinks" onclick="openCity(event, 'Paris')">Fulfilled</button>
        <button class="tablinks" onclick="openCity(event, 'Tokyo')">Denied</button>
    </div>


    <table class="table-auto container mt-12 ">
    <thead class="align-baseline text-gray-200 font-semibold text-lg">
        <tr class="border-b border-gray-700">
            <th class="px-4 py-2 z-20 top-0"></th>
            <td class="px-4 py-2 w-1/2">Title</td>
            <th class="px-4 py-2">Year</th>
            <!-- <td class="px-4 py-2">TMDB ID</td> -->
            <th class="px-4 py-2">Rating</th>
            <th class="px-4 py-2">Status</th>
            <th class="px-4 py-2">Author</th>
            <th class="px-4 py-2">Details</th>
        </tr>
    </thead>
    <tbody class="text-gray-500">

        <?php while($row = $result->fetch_assoc()): ?>

        <tr class="hover:bg-gray-800">  
            <td class="border-b px-4 py-1 border-gray-700 text-orange-300" >
                <img class="h-20" src="https://image.tmdb.org/t/p/w500<?=$row['image']?>">
            </td>
     
            <td class="border-b px-4 py-6 border-gray-700 text-orange-300" >
                <a href="view.php?id=<?=$row['tmdb_id']?>">
                    <?= $row['title'] ?>
                </a>
            </td>
     
            <td class="border-b px-4 py-6 border-gray-700 text-center"><?= $row['release_date'] ?></td>
    
            <!-- <td class="border-b px-4 py-6 border-gray-700"><?= $row['tmdb_id'] ?></td> -->
            <td class="border-b px-4 py-6 border-gray-700 text-center"><?= $row['rating'] ?></td>
            <td class="border-b px-4 py-6 border-gray-700 text-center">
                <button class="bg-green-600 rounded-full px-2 mr-2 text-sm font-semibold text-gray-900 animate-pulse">Active</button>
            </td>

            <td class="border-b px-4 py-6 border-gray-700 text-center"><?= $row['user'] ?></td>


            <td class="border-b px-4 py-6 border-gray-700 text-center">
                <button class="border border-gray-700 bg-gray-900 rounded-full px-2 mr-2 focus:outline-none hover:bg-red-700 hover:text-gray-100 shadow-lg">Delete</button>
                <!-- <input class="focus:bg-yellow-300" type="radio"> -->
            </td>
        </tr>

        <?php endwhile ?>
        
    </tbody>
    </table>
           
    <div class="text-center align-middle mt-12">
        <button class="bg-purple-700 rounded-full text-white px-6 py-2 font-semibold align-middle">Load More</button>
    </div>



    
</div>

<!-- 
<?php include 'footer.php' ?> -->
