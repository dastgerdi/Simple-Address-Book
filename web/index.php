<?php

require_once('php/cities.php');

if($cities === false){
    die('Service is unavailable now');
}

require_once('php/addresses.php');

if($addresses === false){
    die('Service is unavailable now');
}

?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Address Book</title>
        <link href="css/main.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    <body>
    <?php

    if(isset($_GET['message'])){

        $toast = '
            <div class="position-fixed top-0 end-0 p-3" style="z-index: 5">
            <div id="toast" class="toast align-items-center text-white bg-success border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body"> ' . 
                    $_GET['message']
                    . '</div>
                    <button id="close_x" type="button" onclick="close()" class="btn-close btn-close-white me-2 m-auto"></button>
                </div>
                </div>
            </div>
        ';

        echo $toast;

    }else if(isset($_GET['error'])){

        $toast = '
            <div class="position-fixed top-0 end-0 p-3" style="z-index: 5">
            <div id="toast" class="toast align-items-center text-white bg-danger border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body"> ' . 
                    $_GET['error']
                    . '</div>
                    <button id="close_x" type="button" onclick="close()" class="btn-close btn-close-white me-2 m-auto"></button>
                </div>
                </div>
            </div>
        ';

        echo $toast;

    }

    ?>

        <nav class="navbar bg-primary shadow"
        style="
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            width: 100% !important;
        ">
            <h1 class="text-light my-3 mx-5">Address Book</h1>
        </nav>

        <div class="container">

            <div style="height: 5rem"></div>

            <h4 class="mt-5" id="form-title">Add new address</h4>
            <form id="myform" class="shadow border rounded-3 needs-validation" action="php/insert.php" method="post" novalidate>
                <div class="row m-3">
                    <div class="col-sm mb-2">
                        <label for="firstname" class="form-label">Firstname</label>
                        <input type="text" class="form-control" id="firstname" placeholder="Your first name" name="firstname" required>
                        <div class="valid-feedback">
                            Nice first name!
                        </div>
                        <div class="invalid-feedback">
                            Please input your first name
                        </div>
                    </div>
                    <div class="col-sm mb-2">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Your name" name="name" required>
                        <div class="valid-feedback">
                            Awesome name!
                        </div>
                        <div class="invalid-feedback">
                            Please input your name
                        </div>
                    </div>
                    <div class="col-sm mb-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Your email" name="email" required>
                        <div class="valid-feedback">
                            Valid email!
                        </div>
                        <div class="invalid-feedback">
                            Please input a valid email
                        </div>
                    </div>
                </div>
                <div class="row m-3">
                    <div class="col-sm mb-2">
                        <label for="street" class="form-label">Street</label>
                        <input type="text" class="form-control" id="street" placeholder="Where you live" name="street" required>
                        <div class="valid-feedback">
                            All right!
                        </div>
                        <div class="invalid-feedback">
                            Please input street
                        </div>
                    </div>
                    <div class="col-sm mb-2">
                        <label for="zipcode" class="form-label">Zip-code</label>
                        <input type="text" class="form-control" id="zipcode" placeholder="Your zip-code" name="zipcode" required>
                        <div class="valid-feedback">
                            Okay!
                        </div>
                        <div class="invalid-feedback">
                            Please input zip-code
                        </div>
                    </div>
                    <div class="col-sm mb-2">
                        <label for="city" class="form-label">City</label>
                        <select class="form-select" id="city" name="city" aria-label="Default select">
                            <?php

                            $first = true;

                            foreach ($cities as $city){
                                if($first){
                                    $first = false;
                                    echo "<option selected value='" . $city['city_id'] ."'>" . $city['city'] . "</option>";
                                }else{
                                    echo "<option value='" . $city['city_id'] ."'>" . $city['city'] . "</option>";
                                }
                            }

                            ?>
                        </select>
                        <div class="valid-feedback">
                            Beautiful city!
                        </div>
                        <div class="invalid-feedback">
                            Please choose one
                        </div>
                    </div>
                </div>
                <div class="row mx-3 mt-5 mb-3">
                    <div class="col-sm">
                        <button id="submit" type="submit" class="btn btn-primary">Create New Address</button>
                        <div id="clear" class="btn btn-danger">Clear</div>
                    </div>   
                </div>
            </form>

            <div class="row mt-5">
                <div class="col-sm">
                    <h4>Contents</h4>
                </div>
                
                <div class="col-sm">
                    <button id="xml" class="btn btn-success float-end">Export to XML</button>
                    <button id="json" class="btn btn-success  float-end mx-3">Export to Json</button>
                </div>

            </div>
            <div class="mt-3 table-responsive">
                <table class="table table-striped table-hover" id="addressTbl">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First name</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Street</th>
                            <th scope="col">Zip-Code</th>
                            <th scope="col">City</th>
                        </tr>
                    </thead>
                    <tbody id="adrTbody">

                        <?php

                        $i = 0;

                        if($addresses === 'No data'){

                            echo "<tr><th colspan='7'>No address. Please create one.</th></tr>
                            ";

                        }else{

                            foreach ($addresses as $address){

                                $i++;

                                $parameters = "'".$address['user_id']."','".strval($i)."','".$address['firstname']."','".$address['name']."','".$address['email']."','".$address['street']."','".$address['zip_code']."',".$address['city_id'];

                                $row = '

                                <tr onclick="edit('.$parameters.')">
                                    <th scope="row">' . strval($i) . '</th>
                                    <td>' . $address['firstname'] . '</td>
                                    <td>' . $address['name'] . '</td>
                                    <td>' . $address['email'] . '</td>
                                    <td>' . $address['street'] . '</td>
                                    <td>' . $address['zip_code'] . '</td>
                                    <td>' . $address['city'] . '</td>
                                </tr>

                                ';

                                echo $row;

                            }

                        }
                        ?>

                    </tbody>
                </table>
            </div>

        </div>

        <script src="js/main.js"></script>

    </body>

</html>
