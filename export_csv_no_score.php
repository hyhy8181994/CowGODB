<?php  
      //export.php  
 if(isset($_POST["export_no"]))  
 {  
      //$connect = mysqli_connect("localhost", "root", "88914627", "TEST");  
      include ("connect.php");
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=Export_genes_existing_annotations.csv.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('Ensembl_gene_id', 'Gene_name', 'Chromosome', 'GO_term_id', 'GO_term_type', 'GO_term_name','GO_term_category','GO_term_score','GO_level'));   
      $query = "SELECT * from orthocow_new where GO_term_score = 'None' ORDER BY Ensembl_gene_id DESC";  
      $result = mysqli_query($conn, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  
 ?> 
