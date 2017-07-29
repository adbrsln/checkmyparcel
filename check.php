<?php 
if(isset($_POST['lbsinput'])){
    $trackingNo = $_POST['lbsinput'];
    
}else 
    $trackingNo= "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <style>
        body {
            margin-top: 70px;
            background: #333;
            color:white;
            
        }
        a{
            color: #ffffff;
            text-decoration: none !important;
        }
        a:hover
        {
            color:white;
            text-decoration:none;
            cursor:pointer;
        }
        body.modal-open{
            margin-top: 70px;
            background: #333;
            color: black;
                
        }
       
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="display-4 text-center mb-4">Check My Parcel</h1>
                
                <div id="output">
                    <a id="modal1" data-toggle="modal" data-target="#myModal1">
                        <div class="card card-primary mb-2">
                            <div class="card-block">
                                <h4>Pos Laju</h4>
                             </div>
                        </div>
                    </a>
                    <a id="modal2" data-toggle="modal" data-target="#myModal2" >
                        <div class="card card-success mb-2">
                            <div class="card-block">
                                <h4>GD Express / GDex</h4>
                            </div>
                        </div>
                    <a id="modal3" data-toggle="modal" data-target="#myModal3">
                        <div class="card card-danger mb-2">
                            <div class="card-block">
                                <h4>SkyNet Express</h4>
                            </div>
                        </div>
                    </a>
                </div>
                <a href ="#" onclick="goBack()">
                        <div class="card card-warning mb-2">
                            <div class="card-block">
                                <h4><i class="fa fa-chevron-left" aria-hidden="true"> Back</i></h4>
                             </div>
                        </div>
                </a>
            </div>
        </div>
    </div>
    <!-- Modal1 POSLAJU start-->
    <div class="modal fade" id="myModal1" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
            
                <div class="modal-body">
                    <?php
                    #$trackingNo = "EN824328835MY"; # your tracking number
                    $url = "https://checkmyparcel.herokuapp.com/plapi.php?trackingNo=".$trackingNo; # the full URL to the API
                    $getdata = file_get_contents($url); # use files_get_contents() to fetch the data, but you can also use cURL, or javascript/jquery json
                    $parsed = json_decode($getdata,true); # decode the json into array. set true to return array instead of object

                    $httpcode = $parsed["http_code"];
                    $message = $parsed["message"];
                    if($message == "Record Found" && $httpcode == 200)
                    {
                    ?>
                        </br>
                        <table class="table table-striped table-condensed">
                            <thead>
                                <tr>
                                    <th>Date/Time</th>
                                    <th>Status</th>
                                    <th>Location</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                    # iterate through the array
                                    for($i=0;$i<count($parsed['data']);$i++)
                                    {
                                      # access each items in the JSON
                                      echo "
                                        <tr>
                                          <td>".$parsed['data'][$i]['date_time']."</td>
                                          <td>".$parsed['data'][$i]['process']."</td>
                                          <td>".$parsed['data'][$i]['event']."</td>
                                        </tr>
                                        ";
                                    }
                              }else {
                                echo $message . "<br>";
                                # code...
                              }
                              ?>

                            </tbody>
                        </table>

                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>
            </div>

        </div>
    </div>
    <!-- Modal1 ends-->
    <!-- Modal2 GDEXPRESS start-->
    <div class="modal fade" id="myModal2" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
            
                <div class="modal-body">
                    <?php
                    #$trackingNo = "EN824328835MY"; # your tracking number
                    $url = "https://checkmyparcel.herokuapp.com/gapi.php?trackingNo=".$trackingNo; # the full URL to the API
                    $getdata = file_get_contents($url); # use files_get_contents() to fetch the data, but you can also use cURL, or javascript/jquery json
                    $parsed = json_decode($getdata,true); # decode the json into array. set true to return array instead of object

                    $httpcode = $parsed["http_code"];
                    $message = $parsed["message"];
                    if($message == "Record Found" && $httpcode == 200)
                    {
                    ?>
                        </br>
                        <table class="table table-striped table-condensed">
                            <thead>
                                <tr>
                                    <th>Date/Time</th>
                                    <th>Status</th>
                                    <th>Location</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                    # iterate through the array
                                    for($i=0;$i<count($parsed['data']);$i++)
                                    {
                                      # access each items in the JSON
                                      echo "
                                        <tr>
                                          <td>".$parsed['data'][$i]['date_time']."</td>
                                          <td>".$parsed['data'][$i]['status']."</td>
                                          <td>".$parsed['data'][$i]['location']."</td>
                                        </tr>
                                        ";
                                    }
                              }else {
                                echo $message . "<br>";
                                # code...
                              }
                              ?>

                            </tbody>
                        </table>

                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>
            </div>

        </div>
    </div>
    <!-- Modal2 ends-->
    <!-- Modal3 Skynet-->
    <div class="modal fade" id="myModal3" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
            
                <div class="modal-body">
                    <?php
                    //$trackingNo = "EN824328835MY"; # your tracking number
                    $url = "https://checkmyparcel.herokuapp.com/sapi.php?trackingNo=".$trackingNo; # the full URL to the API
                    $getdata = file_get_contents($url); # use files_get_contents() to fetch the data, but you can also use cURL, or javascript/jquery json
                    $parsed = json_decode($getdata,true); # decode the json into array. set true to return array instead of object

                    $httpcode = $parsed["http_code"];
                    $message = $parsed["message"];
                    if($message == "Record Found" && $httpcode == 200)
                    {
                    ?>
                        </br>
                        <table class="table table-striped table-condensed">
                            <thead>
                                <tr>
                                    <th>Date/Time</th>
                                    <th>Process</th>
                                    <th>Location</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                    # iterate through the array
                                    for($i=0;$i<count($parsed['data']);$i++)
                                    {
                                      # access each items in the JSON
                                      echo "
                                        <tr>
                                          <td>".$parsed['data'][$i]['date']." ".$parsed['data'][$i]['time']."</td>
                                          <td>".$parsed['data'][$i]['process']."</td>
                                          <td>".$parsed['data'][$i]['Location']."</td>
                                        </tr>
                                        ";
                                    }
                              }else {
                                echo $message . "<br>";
                                # code...
                              }
                              ?>

                            </tbody>
                        </table>

                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>
            </div>

        </div>
    </div>
    <!-- Modal3 ends-->
    <script>
        
        function check(){
            document.getElementById('output').style.visibility ='hidden';
        }
        function goBack() {
            window.history.back();
        }
       
    </script>
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
</body>

</html>