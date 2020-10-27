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
<script src="bootstrap-4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="./jRange/jquery.range.js"></script>
<script src="./Chartjs/Chart.bundle.js"></script>


<style>


.footer {
  margin: 0px;
  padding:0px;
  position: absolute;
  bottom: -1200px;
  width: 100%;
  height: 70px; /* Set the fixed height of the footer here */
  line-height: 40px; /* Vertically center the text there */
  background-color: #f5f5f5;
  text-align: center;
}
html {
  transform: scale(0.75);
  height:10px;
}


.container {
width: 100%;
margin: 15px auto;
}
.gene{
  width: 50%;
}
.page-display{
  width: 100%;
  margin-left: auto;
  margin-right: auto;  

}
</style>

</head>

<body>

<script type="text/javascript" class="init">
$(document).ready(function() {
	$('#myTable').DataTable({
    "bFilter": false
      });
});
</script>



<!--Logo and navbar-->
<header>
<center><img src="./images/logo.png" width="15%" height="15%"></center>

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

<br>

<div class="page-display">

<!--some text-->
<center><font size = "4" color = "#5a5a5a"><strong>Search for a <i>Bos taurus</i> Ensemble gene id, gene name, GO term id and GO term name</strong></font></center>

<!-- draw down Botton and search box-->
<div class="input-group">
<div class="d-flex justify-content-center align-items-center container ">
<form class="form-inline" action="./Search_page.php" method="POST">


<div class="form-group mx-sm-3 mb-2">

  <input type="text" class="form-control form-control" placeholder="e.g. GRK3;GO:0005829;cytosol" name="gene" id="gene" size="35" minlength="3"/>

  <span class="input-group-btn">
  <button type="submit" class="btn btn-primary mx-sm-3" />Search</button>
  </span>
</div>
</form>
</div>
</div>

<!--tabs-->
<ul class="nav nav-pills mb-3 justify-content-end"" id="pills-tab" role="tablist"><li class="nav-item">
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
<?Php
include("config.php");          

echo "<table id='myTable' class='display'>";
echo "<thead>";
echo "<tr><th>Ensembl gene id</th><th>Gene name</th><th>Chromosome</th><th>GO term id</th><th>GO term name</th><th>GO term type</th><th>GO term category</th><th>GO term score</th><th>GO level</th></tr>";
echo "</thead>";
//$query="SELECT * FROM orthocow limit 2000";
echo "<tbody>";
//foreach ($dbo->query($query) as $row) {
//echo "<tr><td>$row[Ensembl_gene_id]</td><td>$row[Gene_name]</td><td>$row[Chromosome]</td><td>$row[GO_term]</td><td>$row[GO_term_name]</td><td>$row[GO_term_type]</td><td>$row[GO_term_category]</td><td>$row[GO_term_score]</td><td>$row[GO_level]</td></tr>";
//}
echo "</tbody>";
echo "</table>";
?>
</div>
</div>




<?php
 include('connect.php');
 $query_1 = mysqli_query($conn, "SELECT GO_term_score, count(*) as freq from orthocow_new where Ensembl_gene_id LIKE '%{$gene_id}%' or GO_term_name LIKE '%{$gene_id}%' or Gene_name LIKE '%{$gene_id}%' or GO_term_id LIKE '%{$gene_id}%' group by GO_term_score");
 $query_2 = mysqli_query($conn, "SELECT GO_term_score, count(*) as freq from orthocow_new where Ensembl_gene_id LIKE '%{$gene_id}%' or GO_term_name LIKE '%{$gene_id}%' or Gene_name LIKE '%{$gene_id}%' or GO_term_id LIKE '%{$gene_id}%' group by GO_term_score");
 $query_3 = mysqli_query($conn, "SELECT GO_level, count(*) as freq from orthocow_new where Ensembl_gene_id LIKE '%{$gene_id}%' or GO_term_name LIKE '%{$gene_id}%' or Gene_name LIKE '%{$gene_id}%' or GO_term_id LIKE '%{$gene_id}%' group by GO_level");
 $query_4 = mysqli_query($conn, "SELECT GO_level, count(*) as freq from orthocow_new where Ensembl_gene_id LIKE '%{$gene_id}%' or GO_term_name LIKE '%{$gene_id}%' or Gene_name LIKE '%{$gene_id}%' or GO_term_id LIKE '%{$gene_id}%' group by GO_level");
?>

<!--chart content-->
<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
<div class = "row">

<div class = "col-5">
<center><font size = "5">GO term scores count</font></center>
<br>
<div class="container">
<canvas id="score" width="400" height="400"></canvas>
</div>
</div>

<div class = "col-5">
<center><font size = "5">GO term levels count</font></center>
<br>
<div class="container_2">
<canvas id="level" width="300" height="300"></canvas>
</div>
</div>

</div>

</div>

<br>
<br>


<!--chart setup-->
<script>
var ctx = document.getElementById("score");
var myChart = new Chart(ctx, {
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
var myChart = new Chart(ctx, {
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


<p><font color = "white">CowGoDB</font></p>
<br>

<!-- footer -->
<footer class="footer">
  <div class="container">
  <small> Copyright &copy; <script>document.write(new Date().getFullYear())</script>
 Rui Huang. All Right Reserved</small>
  </div>
</footer>



</body>
</html>


