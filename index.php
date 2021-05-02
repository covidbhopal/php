<!DOCTYPE html>
  <html lang="en">
  <head>
      <!-- Required meta tags -->
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Bootstrap CSS -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
      <!-- Bootstap Bundle JS  -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
      crossorigin="anonymous"></script>
      <!-- FAVICON -->
      <link rel="icon" type="image/png" href="https://cdn3.iconfinder.com/data/icons/coronavirus-filled/32/coronavirus-26-128.png">
      <!-- CSS LINKING -->
      <link rel="stylesheet" type="text/css" href="/webjars/bootstrap/css/bootstrap.min.css" />
      <title>COVID Bhopal</title>
  </head>
  <body>
      <style>
      tr:hover{
                background: lightgray !important;
            }
           h1{
                margin:0;
                padding: 0;
                font-size: 35px;
                font-family: monospace;
            }
            #table-heading{
                margin-top: 2%;
            }
            #casesList tr:first-child{
                font-weight: 600;
                background-color: #c5edf7;
                font-size: 130%;
            }
            #casesList tr td:first-child{
                font-weight: 600;
                width: 20%;
            }
            .table{
                width: 80%;
                margin-left: auto;
                margin-right: auto;
                margin-top: 25px;
            }
            #casesList tr td:nth-child(2){
                color: red;
            }
            #casesList tr td:nth-child(3){
                color: green;
            }
            #casesList tr td:nth-child(4){
                color: red;
            }
            #casesList tr td:nth-child(5){
                color: red;
            }
            @media (max-width: 500px) {
            .table {
            width: fit-content;
            overflow-x: scroll
            }
            }
            div{
            white-space: nowrap;
            }
        
      </style>
    <section>
     <div class="table-responsive">
      <h1 style="text-align: center;" class="text-center" id="table-heading"> COVID Cases in MP
        <?php 
              $state = "Madhya Pradesh";
              if($_SERVER["REQUEST_METHOD"] == "POST")
         ?></h1>
        <table class="table table-bordered table-striped text-center" id="casesList">
                    
            <tr>
                <td>District</td>
                <td>Confirmed</td>
                <td>Recovered</td>
                <td>Deceased</td>
                <td>Active</td>
            </tr>
        
            <?php 
                    function test_input($data) {
                        $data = trim($data);
                        $data = stripslashes($data);
                        $data = htmlspecialchars($data);
                        return $data;
                    }
                    
                    $data = file_get_contents('https://api.covid19india.org/district_wise.json');
                    $coronalive = json_decode($data,True);
                    $districtcount = count($coronalive['districts']);
                    $i = 1;
                    while($i < $districtcount){
                        if($coronalive['districts'][$i]['state'] == $state){
                    ?>
                    <tr>
                        <td><?php echo $coronalive['districts'][$i]['district'];?></td>
                        <td><?php echo $coronalive['districts'][$i]['confirmed'];?></td>
                        <td><?php echo $coronalive['districts'][$i]['recovered'];?></td>
                        <td><?php echo $coronalive['districts'][$i]['deceased'];?></td>
                        <td><?php echo $coronalive['districts'][$i]['active']. "<br>";?></td>
                    </tr>
                    <?php 
                        }
                      $i++;
                    }
                ?>
        </table>
      </div>
    </section>
  </body>
  </html>