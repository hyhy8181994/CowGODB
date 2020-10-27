<?php  
 if(isset($_POST["export"]))  
 {    
      //$connect = mysqli_connect("localhost", "root", "88914627", "TEST");  
      include ("connect.php");
      include ("score_range.php");
      if (empty($select)){
           $select = "";
      } 
           
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=Export_current_table.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('Ensembl_gene_id', 'Gene_name', 'Chromosome', 'GO_term_id', 'GO_term_type', 'GO_term_name','GO_term_category','GO_term_score',"GO_level"));  
      $query = "SELECT * FROM orthocow_new where (Ensembl_gene_id LIKE '%{$gene_id}%' or GO_term_name LIKE '%{$gene_id}%' or Gene_name LIKE '%{$gene_id}%' or GO_term_id LIKE '%{$gene_id}%') AND (GO_term_score between {$score_1} and {$score_2} {$select})";  
      $result = mysqli_query($conn, $query);  
      while($row = mysqli_fetch_assoc($result))  
      {  
           fputcsv($output, $row);  
      }  
      fclose($output);  
 }  
 ?> 