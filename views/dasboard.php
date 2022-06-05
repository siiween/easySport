

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
      integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" type="text/css" href="assets/styles/profile.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Quantico&display=swap"
      rel="stylesheet"
    />
    <link rel="icon" type="image/x-icon" href="assets/images/logo.png" />
    <title>Document</title>
    
</head>
<body>
<?php

    function get_schema_size(){
        $mysqli = new mysqli("bbdd.dlsi.ua.es:3306","gi_easysport",".easysport.","information_schema");

        $query = "SELECT SUM(data_length + index_length) / 1024 / 1024 AS 'Tam' FROM tables WHERE table_schema = 'gi_easysport' group by table_schema;";

        $result = $mysqli -> query($query);
        $result = $result->fetch_assoc();
        return $result['Tam'];
    }

    function get_free_server_space(){
        $mysqli = new mysqli("bbdd.dlsi.ua.es:3306","gi_easysport",".easysport.","information_schema");
        $query = "SELECT SUM(data_free) / 1024 / 1024 AS 'Tam' FROM tables;";

        $result = $mysqli -> query($query);
        $result = $result->fetch_assoc();
        return $result['Tam'];
    }

    
    function get_tables_space(){
        $mysqli = new mysqli("bbdd.dlsi.ua.es:3306","gi_easysport",".easysport.","information_schema");
        $query = "SELECT table_name,(data_length + index_length)/1024/1024 AS 'Tam' FROM tables WHERE table_schema = 'gi_easysport'";

        $result = $mysqli -> query($query);
        $data = array();
        while($row = $result->fetch_assoc()) {
            array_push($data,$row);
        }
        return $data;
    }

    
?>


 <div class="container-fluid p-0">

    <?php include('navbar.php') ?>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo(round(get_schema_size())); ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted">Tamaño de la bd (MBs)</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo(round(get_free_server_space())); ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted">Espacio libre del servidor (MBs)</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-6"></div>
                    <div class="col-6"></div>
                </div>
            </div>
            <div class="col-md-8">
            <canvas id="myChart" ></canvas>
            </div>
            <div class="col-12 mt-5">
            <table class="table table-bordered">
                <thead>
                    <th scope="col">Duración</th>
                    <th scope="col">Consulta</th>
                </thead>
                <tbody>
                    <?php
                        $mysqli = new mysqli("bbdd.dlsi.ua.es:3306","gi_easysport",".easysport.","gi_easysport");
                        $cache="RESET QUERY CACHE;FLUSH TABLES;";
                        $mysqli -> query($cache);
                        $profiling="SET profiling=1;";
                        $mysqli -> query($profiling);
                        $query="SELECT * FROM user u  INNER JOIN subscription s ON s.user_id=u.id INNER JOIN booking b ON b.user_id=u.id;";

                        for ($i=0; $i < 30; $i++) { 
                            $mysqli -> query($query);
                        }


                        $show = "show profiles;";
                        
                        $result=$mysqli -> query($show);

                        while($row = $result->fetch_assoc()) {
                    ?>        
                        <tr>
                            <td><?php echo($row["Duration"]) ?></td>
                            <td><?php echo($row["Query"]) ?></td>
                        </tr>
                    <?php    
                        }
                    ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>

<script>
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?php 
                $array=get_tables_space();
                for($i=0;$i<count($array);$i++){ 
                    echo("'".$array[$i]['table_name']."'"); 
                    if ($i === count($array)-1){
                        echo("");
                    }else{
                        echo(",");
                    }
                }
            ?>],
        datasets: [{
            label: 'MBs',
            data: [<?php 
                    for($i=0;$i<count($array);$i++){ 
                        echo($array[$i]['Tam']); 
                        if ($i === count($array)-1){
                            echo("");
                        }else{
                            echo(",");
                        }
                    }
                ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        indexAxis: 'y',
        scales: {
            y: {
                beginAtZero: true
            }
        },
        responsive: true,
        plugins: {
            legend: {
                position: 'right',
            },
            title: {
                display: true,
                text: 'MBs de cada tabla'
            }
        }
    }
}
);
</script>

</body>
</html>