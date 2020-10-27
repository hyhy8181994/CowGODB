<!doctype html>
<html>
<head>
<!--css-->
<link rel="stylesheet" href="./DataTables-1.10.18/css/jquery.dataTables.min.css" type="text/css">
<link rel="stylesheet" href="./bootstrap-4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="./jQuery-3.3.1/jquery.range.css">

<!--script-->
<script type="text/javascript" language="javascript" src="./jQuery-3.3.1/jquery-3.3.1.js"></script>
<script type="text/javascript" language="javascript" src="./DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="./bootstrap-4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="./jRange/jquery.range.js"></script>
<script src="./Chartjs/Chart.bundle.js"></script>

<style>
.slidecontainer {
  width: 100%;
}

.slider {
  -webkit-appearance: none;
  width: 50%;
  height: 25px;
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.slider:hover {
  opacity: 1;
}

.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 25px;
  height: 25px;
  background: #4CAF50;
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 25px;
  height: 25px;
  background: #4CAF50;
  cursor: pointer;
}
.btn-group:after {
  content: "";
  clear: both;
  display: table;
}

.btn-group button:not(:last-child) {
  border-right: none; /* Prevent double borders */
}

.footer {
  position: absolute;
  width: 100%;
  height: 70px; /* Set the fixed height of the footer here */
  line-height: 40px; /* Vertically center the text there */
  background-color: #f5f5f5;
  text-align: center;
}
.container {
width: 70%;

margin: 15px auto;
}

html {
  transform: scale(0.75);
  height:10px;
}

.container_2 {
  width: 70%;
}

.search{
 margin-left: -100px;
}


.search-text{
  margin-top: 20px;
}


</style>
</head>
<body>

<!--Datatable setup-->
<script type="text/javascript" class="init">

$(document).ready(function() {
	var table = $('#myTable').DataTable({
    "initComplete": function(settings, json) {
    $('#loadingSpinner').hide();
    }
    });
} );
</script>



<!--nav bar and logo pic-->
<header>
<center><img src="./images/logo.png" width=15%" height="15%"></center>

<nav class="navbar navbar-expand-lg rounded navbar-light bg-light rounded">
<div class="collapse navbar-collapse justify-content-md-center" style="height: 20px;">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="./index.php">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="./Team.php">Team</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="./About.php">About</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="./Contact.php">Contact</a>
    </li>
  </ul>
</div>
</nav>
</header>

<body>

<br>


<div class = "row">

<div class = "col-5">

<table class = "table table-borderless">

<tr>

<td>
<!--some text-->
<div class = "search-text">
<font size = "4" color = "#5a5a5a"><strong>Search: </strong></font>
</div>
</td>

<td>

<div class = "search">
<div class="d-flex justify-content-center align-items-center container ">
<form class="form-inline" action="./Search_page.php" method="POST">

<div class="form-group mx-sm-3 mb-2 mr-5">

  <input type="text" class="form-control form-control" placeholder="e.g. GRK3;GO:0005829;cytosol" name="gene" id="gene" size="35" minlength="3"/>


  <button type="submit" class="btn btn-primary mx-sm-3" />Search</button>

</div>
</form>
</div>

</div>

</td>
</tr>
</table>

</div> <!--col-->


<div class = "col">

<table class = "table table-borderless">

<tr>

<td>

<div class="page-display">

<p><strong><span style = "color: #5a5a5a; font-size: 13pt">Select GO term score range</span></strong></p>

</div>
</td>

<td align = "right">
<!-- display the range slider -->
<div id="selection">
<div class="filter-panel">


<input class="score_range" type="hidden" value="0,4.34"/>
<div class="form-check">

<br>



<center><input class="check-input" type="checkbox" value="AND (GO_term_score != 'None')" id="check" style="margin-leftL 100px;"> Remove existing annotation GO term <br> </center>
  
</div>


</td>

<td>

<input type="button" onclick="filterProducts()" class="btn btn-primary" value = "Filter">
</div>


</td>

</tr>

</div>


</table>

</div> 

</div><!--col-->


<!--tabs-->

<ul class="nav nav-pills mb-3 justify-content-end" id="pills-tab" role="tablist">

<li class="nav-item">

<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Table</a>
</li>
<li class="nav-item">
<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Graph</a>
</li>
</ul>

<!--table content-->
<div class="tab-content" id="myTabContent">
<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
<div id="datacontainer">



<?php
require "config.php";           

$start=$_GET['start'];
if(strlen($start) > 0 and !is_numeric($start)){
echo "Data Error";
exit;
}


if(isset($_POST['gene'])){
  $gene_id_1 = $_POST['gene'];
  $gene_id = preg_replace('/\s+/', '_', $gene_id_1);
  $gene_id = rtrim($gene_id, "_");
  //$gene_id = preg_replace(' ',"_",$gene_id);
  if(strlen($gene_id)==0){
    $gene_id="GRK3";
  }




  echo "<center><font color = '#DC5353'><h4>Search results for $gene_id</h4></font></center>";
  echo "<div class='col-md-12'>";
  echo "<center><div class='spinner-border' role='status' id='loadingSpinner'><span class='sr-only'>Loading...</span></div></center>";
  echo "</div>";
  echo "<table id='myTable' class='display'>";
  echo "<thead>";
  echo  "<tr><th>Ensembl gene id</th><th>Gene name</th><th>Chromosome</th><th>GO term id</th><th>GO term name</th><th>GO term type</th><th>GO term category</th><th>GO term score</th><th>GO level</th></tr>";
  echo "</thead>";
  $query=" SELECT * FROM orthocow_new where Ensembl_gene_id LIKE '%{$gene_id}%' or GO_term_name LIKE '%{$gene_id}%' or Gene_name LIKE '%{$gene_id}%' or GO_term_id LIKE '%{$gene_id}%'";
  //$query=" SELECT * FROM results where Ensembl_gene_id ='".$gene_id."'";
  echo "<tbody>";
  foreach ($dbo->query($query) as $row) {
  
  
  echo "<tr><td>$row[Ensembl_gene_id]</td><td>$row[Gene_name]</td><td>$row[Chromosome]</td><td>$row[GO_term_id]</td><td>$row[GO_term_name]</td><td>$row[GO_term_type]</td><td>$row[GO_term_category]</td><td>$row[GO_term_score]</td><td>$row[GO_level]</td></tr>";
  }
  echo "</tbody>";
  echo "</table>";
}


?>
</div>
</div>

<?php
 include('./connect.php');
 $query_1 = mysqli_query($conn, "SELECT GO_term_score, count(*) as freq from orthocow_new where Ensembl_gene_id LIKE '%{$gene_id}%' or GO_term_name LIKE '%{$gene_id}%' or Gene_name LIKE '%{$gene_id}%' or GO_term_id LIKE '%{$gene_id}%' group by GO_term_score");
 $query_2 = mysqli_query($conn, "SELECT GO_term_score, count(*) as freq from orthocow_new where Ensembl_gene_id LIKE '%{$gene_id}%' or GO_term_name LIKE '%{$gene_id}%' or Gene_name LIKE '%{$gene_id}%' or GO_term_id LIKE '%{$gene_id}%' group by GO_term_score");
 $query_3 = mysqli_query($conn, "SELECT GO_level, count(*) as freq from orthocow_new where Ensembl_gene_id LIKE '%{$gene_id}%' or GO_term_name LIKE '%{$gene_id}%' or Gene_name LIKE '%{$gene_id}%' or GO_term_id LIKE '%{$gene_id}%' group by GO_level");
 $query_4 = mysqli_query($conn, "SELECT GO_level, count(*) as freq from orthocow_new where Ensembl_gene_id LIKE '%{$gene_id}%' or GO_term_name LIKE '%{$gene_id}%' or Gene_name LIKE '%{$gene_id}%' or GO_term_id LIKE '%{$gene_id}%' group by GO_level");
 $selected_score_1 = 0;
 $selected_score_2 = 4.34;
 $var_str_1 = var_export($selected_score_1, true);
 $var_str_2 = var_export($selected_score_2, true);
 $var = "<?php\n\n\$score_1 = $var_str_1;\n\$score_2 = $var_str_2;\n\$select = \"$none_select\";\n\$gene_id = \"$gene_id\";\n\n?>";
 file_put_contents('./score_range.php', $var);
 


?>

<!--chart content-->
<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
<div class = "row">

<div class = "col-6">
<center><font size = "5">GO term scores count</font></center>
<br>
<div class="container">
<canvas id="score" width="300" height="300"></canvas>
</div>
</div>

<div class = "col-6">
<center><font size = "5">GO term levels count</font></center>
<br>
<div class="container_2">
<canvas id="level" width="300" height="300"></canvas>
</div>
</div>

</div>

</div>
<br>

<!-- draw down Botton-->
<div class="btn-group" style="float: right;">
<div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" id="downloads" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Export
  </button>
  <div class="dropdown-menu" aria-labelledby="downloads"> 
<form method="post" action="./export_csv.php">
<button type="submit" name="export_all" class="dropdown-item">Export entire raw data</button>
</form>
<form class="form" action="./export_search.php" method="POST">
<button type="submit" name="export" class="dropdown-item" />Export current table</button>
</form>
<form method="post" action="./export_csv_no_score.php">
<button type="submit" name="export_no" class="dropdown-item">Export all genes only with existing annotations</button>
</form>
<form method="post" action="./export_csv_score.php">
<button type="submit" name="export_yes" class="dropdown-item">Export all genes only with new annotations</button>
</form>
</div>
</div>

</div>
</div>

</div>

<br>
<br>
<!-- Send selected score range to get_query.php -->
<script>
function filterProducts() {
    var score_range = $('.score_range').val();
    var search_result = "<?php echo $gene_id ?>";
    var none_select = $('.check-input:checked').val();
    $.ajax({
        type: 'POST',
        url: './get_query.php',
        data:{'score_range' : score_range, "search": search_result ,"none": none_select },
        beforeSend: function () {
            $('.selection').css("opacity", ".5");
        },
        success: function (html) {
            $('#datacontainer').html(html);
            $('.selection').css("opacity", "");
        }
    });
    
}

</script>

<!-- set up range slider -->
<script>
        
        $(document).ready(function(){
            $('.score_range').jRange({
                from: 0,
                to: 4.34,
                step: 0.01,
                format: '%s',
                width: 500,
                showLabels: true,
                isRange : true,
                theme : "theme-blue"
            });
        });

</script>

<!--chart setup-->
<script>
var ctx = document.getElementById("score");
var myChart_one = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [<?php while ($b = mysqli_fetch_array($query_1)) { echo '"' . $b['GO_term_score'] . '",';}?>],
                datasets: [{
                        label: 'GO term score count',
                        data: [<?php while ($q = mysqli_fetch_array($query_2)) { echo $q['freq'].',';}?>],
                        backgroundColor: ["#3e95cd", "#3e95cd","#3e95cd","#3e95cd","#3e95cd","#3e95cd","#3e95cd","#3e95cd","#3e95cd","#3e95cd","#3e95cd", "#3e95cd","#3e95cd","#3e95cd","#3e95cd","#3e95cd","#3e95cd","#3e95cd","#3e95cd","#3e95cd"],
                        borderWidth: 1
                    }]
            },
            options: {
              legend: {
                       display: true,
                       position: 'top',
                      labels: {
                      boxWidth: 80,
                      fontSize: 20
                      }
  },
                scales: {
                    yAxes: [{
                      ticks: {
                                beginAtZero: true,
                                fontSize: 20
                            },
                            scaleLabel: {
                                display: true,
                                labelString: "GO term score count",
                                fontSize: 20
                            }
                        }],
                    xAxes: [{
                      ticks: {
                                fontSize: 20
                            },
                            scaleLabel: {
                                display: true,
                                labelString: "GO score",
                                fontSize: 20
                            }
                        }]
                }
            }
        } );
</script>

<script>
var ctx = document.getElementById("level");
var myChart_two = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [<?php while ($b = mysqli_fetch_array($query_3)) { echo '"' . $b['GO_level'] . '",';}?>],
                datasets: [{
                        label: 'GO level count',
                        data: [<?php while ($q = mysqli_fetch_array($query_4)) { echo $q['freq'].',';}?>],
                        backgroundColor: ["#3e95cd", "#3e95cd","#3e95cd","#3e95cd","#3e95cd","#3e95cd","#3e95cd","#3e95cd","#3e95cd","#3e95cd","#3e95cd", "#3e95cd","#3e95cd","#3e95cd","#3e95cd","#3e95cd","#3e95cd","#3e95cd","#3e95cd","#3e95cd"],
                        borderWidth: 1
                    }]
            },
            options: {
              legend: {
                       display: true,
                       position: 'top',
                      labels: {
                      boxWidth: 80,
                      fontSize: 20
                      }
  },
              scales: {
                    yAxes: [{
                      ticks: {
                                beginAtZero: true,
                                fontSize: 20
                            },
                            scaleLabel: {
                                display: true,
                                labelString: "GO level count",
                                fontSize: 20
                            }
                        }],
                    xAxes: [{
                      ticks: {
                                fontSize: 20
                            },
                            scaleLabel: {
                                display: true,
                                labelString: "GO level",
                                fontSize: 20
                                
                            }
                        }]
                }
            }
        } );
</script>


<!-- footer -->
<footer class="footer">
      <div class="container">
      <small> Copyright &copy; <script>document.write(new Date().getFullYear())</script>
 Rui Huang. All Right Reserved</small>
      </div>
    </footer>
</body>
<br>
<br>
<br>

</html>
