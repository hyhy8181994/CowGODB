<script src="./Chartjs/Chart.bundle.js"></script>

<script type="text/javascript" class="init">
$(document).ready(function() {
	var table = $('#myTable').DataTable({
    "initComplete": function(settings, json) {
    $('#loadingSpinner').hide();
    }
    });
} );
</script>

<?Php
if(isset($_POST["score_range"])){

require_once("./config.php");           // All database details will be included here 

$score = $_POST["score_range"];
if(!empty($score)){
    $scoreRangeArr = explode(',', $score);
    $selected_score_1 = $scoreRangeArr[0];
    $selected_score_2 = $scoreRangeArr[1];
} else{
$selected_score_1 = "0";
$selected_score_2 = "4.34";
}

$gene_id = $_POST["search"];
if(empty($gene_id)){
    $gene_id = "GRK3";
}

$none = $_POST["none"];
if(!empty($none)){
    $none_select = $none;
} else{
    $none_select = "OR (GO_term_score = 'None')";
}


$var_str_1 = var_export($selected_score_1, true);
$var_str_2 = var_export($selected_score_2, true);
$var = "<?php\n\n\$score_1 = $var_str_1;\n\$score_2 = $var_str_2;\n\$select = \"$none_select\";\n\$gene_id = \"$gene_id\";\n\n?>";
file_put_contents('./score_range.php', $var);



echo "<center><font color = '#DC5353'><h4>Filtered search results for $gene_id</h4></font></center>";
echo "<div class='col-md-12'>";
echo "<center><div class='spinner-border' role='status' id='loadingSpinner'><span class='sr-only'>Loading...</span></div></center>";
echo "</div>";
echo "<table id='myTable' class='display'>";
echo "<thead>";
echo  "<tr><th>Ensembl gene id</th><th>Gene name</th><th>Chromosome</th><th>GO term id</th><th>GO term name</th><th>GO term type</th><th>GO term category</th><th>GO term score</th><th>GO level</th></tr>";
echo "</thead>";

$query="SELECT * FROM orthocow_new where (Ensembl_gene_id LIKE '%{$gene_id}%' or GO_term_name LIKE '%{$gene_id}%' or Gene_name LIKE '%{$gene_id}%' or GO_term_id LIKE '%{$gene_id}%') AND (GO_term_score between {$selected_score_1} and {$selected_score_2} {$none_select})";
echo "<tbody>";
foreach ($dbo->query($query) as $row) {
echo "<tr><td>$row[Ensembl_gene_id]</td><td>$row[Gene_name]</td><td>$row[Chromosome]</td><td>$row[GO_term_id]</td><td>$row[GO_term_name]</td><td>$row[GO_term_type]</td><td>$row[GO_term_category]</td><td>$row[GO_term_score]</td><td>$row[GO_level]</td></tr>";
}
echo "</tbody>";
echo "</table>";
}


?>


<?php
 require('./connect.php');
 $query_1 = mysqli_query($conn, "SELECT GO_term_score, count(*) as freq from orthocow_new where (Ensembl_gene_id LIKE '%{$gene_id}%' or GO_term_name LIKE '%{$gene_id}%' or Gene_name LIKE '%{$gene_id}%' or GO_term_id LIKE '%{$gene_id}%') AND (GO_term_score between {$selected_score_1} and {$selected_score_2} {$none_select}) group by GO_term_score");
 $query_2 = mysqli_query($conn, "SELECT GO_term_score, count(*) as freq from orthocow_new where (Ensembl_gene_id LIKE '%{$gene_id}%' or GO_term_name LIKE '%{$gene_id}%' or Gene_name LIKE '%{$gene_id}%' or GO_term_id LIKE '%{$gene_id}%') AND (GO_term_score between {$selected_score_1} and {$selected_score_2} {$none_select}) group by GO_term_score");
 $query_3 = mysqli_query($conn, "SELECT GO_level, count(*) as freq from orthocow_new where (Ensembl_gene_id LIKE '%{$gene_id}%' or GO_term_name LIKE '%{$gene_id}%' or Gene_name LIKE '%{$gene_id}%' or GO_term_id LIKE '%{$gene_id}%') AND (GO_term_score between {$selected_score_1} and {$selected_score_2} {$none_select}) group by GO_level");
 $query_4 = mysqli_query($conn, "SELECT GO_level, count(*) as freq from orthocow_new where (Ensembl_gene_id LIKE '%{$gene_id}%' or GO_term_name LIKE '%{$gene_id}%' or Gene_name LIKE '%{$gene_id}%' or GO_term_id LIKE '%{$gene_id}%') AND (GO_term_score between {$selected_score_1} and {$selected_score_2} {$none_select}) group by GO_level");
?>
 


 <script>
var ctx = document.getElementById("score");

myChart_one.destroy();


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

myChart_two.destroy();

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