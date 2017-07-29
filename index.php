
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
    <style>
        body {
            margin-top: 70px;
            background: #333;
            color:white;
            
        }
        a{
            color: #ffffff;
            text-decoration: none;
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
                <form method ="POST" action="check.php">
                    <div class="input-group mb-2">
                        <input id="lbsInput" type="text" name="lbsinput" class="form-control form-control-lg" placeholder="Enter Tracking Number">
                        <i class = "fa fa-btn fa-check"><button type ="submit" name= "submit" class = "btn btn-lg btn-primary">Go!</button></i>
                    </div>
                </form>
                <div id="output">
                    <div class="card card-primary mb-2">
                        <div class="card-block">
                            <h4>Pos Laju</h4>
                            <p>e.g: <strong>EN824328835MY</strong></p>
                        </div>
                    </div>
                    <div class="card card-success mb-2">
                        <div class="card-block">
                            <h4>GD Express / GDex</h4>
                            <p>e.g: <strong>4932890981</strong></p>
                        </div>
                    </div>
                    <div class="card card-danger mb-2">
                        <div class="card-block">
                            <h4>SkyNet Express</h4>
                            <p>e.g: <strong>1334652346</strong></p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
</body>

</html>