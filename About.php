<!doctype html>
<html>
<head>
<meta charset="utf-8">
<!--css-->
<link rel="stylesheet" href="./bootstrap-4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!--scripts-->
<script type="text/javascript" language="javascript" src="./jQuery-3.3.1/jquery-3.3.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="./bootstrap-4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<style>

html {
  position: absolute;
  transform: scale(0.75);
  height:10px;
}
@media (min-width: 400px) {
    #sidebar {
        position: fixed;
        top: 5;
        bottom: 5;
    }
}
.footer {
  position: absolute;
  width: 100%;
  height: 70px; /* Set the fixed height of the footer here */
  line-height: 70px; /* Vertically center the text there */
  background-color: #f5f5f5;
  text-align: center;
}

</style>
</head>





<center><img src="./images/logo.png" width="15%" height="15%"></center>

<nav class="navbar navbar-expand-lg rounded navbar-light bg-light rounded">

<div class="collapse navbar-collapse justify-content-md-center" style="height: 20px;">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="./index.php">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="./Team.php">Team</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="./About.php">About</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="./Contact.php">Contact</a>
    </li>
  </ul>
</div>
</nav>




<!--sidebar-->
<br>




<body data-spy="scroll" data-target="#sidebar" data-offset="1">
<div class="container-fluid h-100">
<div class="row h-100"> 
<div class="col-3 " id="sidebar"> 
<div class="nav nav-pills nav-stacked">
<a class="list-group-item list-group-item-action" href="#list-item-1">About this project</a>
<a class="list-group-item list-group-item-action" href="#list-item-2">Data sources</a>
<a class="list-group-item list-group-item-action" href="#list-item-3">Pre- and post-dataprocessing</a>
<a class="list-group-item list-group-item-action" href="#list-item-4">Software and development</a>
<a class="list-group-item list-group-item-action" href="#list-item-5">Q&A</a>
<a class="list-group-item list-group-item-action" href="#list-item-6">References</a>
<a class="list-group-item list-group-item-action" href="#list-item-7">Downloads</a>

</div>
</div>
</div>

<div data-spy="scroll" data-target="#sidebar" class="col-9 offset-2" data-offset="50">
<main class="col-8 offset-2">
<h4 id="list-item-1"><font size=6>About this project</font></h4>
<font size=4>
<p>
<strong><i>CowGoDB</i></strong> is a database of <i>Bos taurus</i> genes and gene annotations. The database contains the existing gene annotations (based on Ensembl Biomart) and newly introduced gene annontaions based on our gene annotation enrichment method. 
This method is inspired by the concept of ortholog. An ortholog is defined as a gene originated from a single ancestral gene in the last common ancestor of compared genome (via speciation event) and the simple definition restricts the number of ancestral genes and ancestors, which means orthologs between different species can be usually considered as being the same gene with equivalent biological function⁠ (Koonin, 2005). 
In general, We created an automatic gene annotation enrichment pipeline for animal genomes based on orthologs found in other animal species and using this pipeline to enrich <i>Bos Taurus</i> (cow) gene annotations based on orthologs identified in <i>Sus scrofa</i> (pig), <i>Capra hircus</i> (goat), <i>Ovis aries</i> (sheep), <i>Equus caballus</i> (horse), <i>Homo sapiens</i> (human), <i>Mus musculus</i> (mouse) and <i>Gallus gallus</i> (chicken). 
</p>
<p>
In this website, we present a filtering tool for the database, which can filter data based on the GO term score we assigned to each newly introduced GO terms to <i>Bos taurus</i> genes.
</p>
</font> 
<br>
<h4 id="list-item-2"><font size=6>Data sources</font></h4>
<p>
<font size=4>For this research, eight animal species are selected: <i>Bos taurus</i>, <i>Sus scrofa</i>, <i>Capra hircus</i>, <i>Ovis aries</i>, <i>Equus caballus</i>, <i>Homo sapiens</i>, <i>Mus musculus</i> and <i>Gallus gallus</i>. Their phylogenetic relations are displayed in Figure 1 and a phylogenetic tree is produced using NCBI data and iTOL (Letunic and Bork, 2016). 
Genetic information, chromosome position, gene ontology (GO) and orthologs of each pair of species were retrieved from <a href="https://useast.ensembl.org/index.html" target="_blank">Ensembl Biomart release 96 </a>(April 2019) through the pybiomart python library (downloaded on April 29th, 2019)(Frankish et al., 2017). 
The GO term vocabularies are obtained from the Gene Ontology Consortium – release (<a href="http://geneontology.org/docs/download-ontology/" target="_blank">The Gene Ontology Consortium </a>, 2018)
For chromosome information, only <i>Sus scrofa</i>, <i>Homo sapiens</i>, <i>Mus musculus</i> and <i>Gallus gallus</i> have complete sex chromosome information, and other species only X chromosome information is available except <i>Capra hircus</i> which has no sex chromosome information is available. 
We noticed that the percentage of genes with GO terms is much lower than expected especially in <i>Homo sapiens</i> and <i>Mus musculus</i>, which is due to Ensembl database also including non-coding genes and pseudogenes whose numbers are especially high in <i>Homo sapiens</i> and <i>Mus musculus</i>. 
In addition, orthologs information of each pair of species were also downloaded from <a href="https://omabrowser.org/oma/home/" target="_blank">OMA browser</a> except <i>Capra hircus</i>, which was not available (downloaded on March 3rd, 2019) (Altenhoff et al., 2017). </font>
<center><img src = "./images/tree.png" width="150%" height="150%"></center>
<center><figcaption><strong>Figure 1.</strong>Phylogenetic tree of 8 animal species using the NCBI Common Tree tools and iTOL</figcaption></center>
</p>
<br>
<h4 id="list-item-3"><font size=6>Pre- and post-dataprocessing</font></h4>
<font size=4>
<p>
In data pre-processing, the missing values were replaced with “None” and the obsolete GO terms were replaced with substitute GO terms based on the GO-basic information from the Gene Ontology Consortium – release (The Gene Ontology Consortium, 2018). 
Orthologs were filtered based on their ortholog type and only one-to-one ortholog type are selected for further analysis. In addition, the gene names of orthologs between two species are investigated to decide whether they can be considered the same or different.
There are in total 799,080 orthologs identified with the same or equivalent gene name.
Ortholog files from Ensembl and OMA are fused, but ortholog records from Ensembl include those from OMA, therefore only Ensembl ortholog files are used for this analysis. In addition, all ortholog files are fused into one single file and the duplicated orthologous gene relations are removed, reducing ortholog counts from 1,293,308 to 646,654. 
Cliqer software is used to identify cliques of orthologs of each pair of selected animals.Cliques were undergoing a filtering process, which removed the smaller cliques that included in larger ones. We also removed the cliques without Bos Taurus genes, leading in total of 23589 cliques.
</p>
<p>
We use the Gene Ontology vocabularies for other 7 animal species genes (provided by Ensembl Biomart) to enrich the functional annotations of Bos taurus genes based on pervious knowledge that includes phylogenetic relations between Bos Taurus and the other 7 animal species. 
A scoring function (Equation 1) is proposed to calculate the reliability of GO term assignment to Bos taurus based on the phylogenetic relations. Based on the phylogeny tree (Figure 1), the 8 animal species are divided into 3 groups and a score Gscore(i) from 1 to 3 is assigned to each species (i) in each group. The score of each GO term of every genes in each clique c is calculated based on Equation 1. The highest score that one clique can get is approximately 4.333, which corresponds to all genes in a size 8 clique: 1 + 1+ 0.5 + 0.5 +0.5 +0.5 + 1/3 ≈ 4.333.
</p>
</font>
<figure>
<center><img src = "./images/equation_1.png"></center>
<br>
<center><img src = "./images/equation_2.png"></center>
<br>
<center><img src = "./images/equation_3.gif"></center>
<br>
<center><figcaption> <strong>Equation 1.</strong> GO term scoring function</figcaption></center>
</figure>
<br> 
<h4 id="list-item-4"><font size=6>Software and development</font></h4>
<font size=4>
<p>
The data pre- and post-processing are processed through Python 3.6.7 programming language.
<a href = "https://users.aalto.fi/~pat/cliquer.html" target="_blank">Cliquer version 1.21</a> is used to identify cliques of orthologs from 8 animal species (Niskanen and Östergård, 2003). Cliquer was developed by Niskanen and Östergård in 2003 based on an exact branch-and-bound algorithm⁠ (Östergård, 2002) and can find cliques in an arbitrary weighted graph. 
</p>
<p>
All data is saved in sql database which is powered by <a href="https://www.mysql.com/" target="_blank">MySQL</a>. The data extraction and filtering from the database is done by PHP script. Table presentation in the main page is powered by <a href = "https://datatables.net/" target="_blank">Datatable</a> plug in. 
</p>
</font>
<br>
<h4 id="list-item-5"><font size="6">Q&A</font></h4>
<font size="4">
<p>
<strong>
How to use the filtering tool?
</strong>
</p>
<p>
First, select the range of GO terms scores using the range slider,and select whether to display existingby annontaions by clicking the tick box. Click Filter to display filtered table.  
The table can be exported in export button as a csv file.
</p>
<p>
<strong>
How to use the search boxes above the table?
</strong>
</p>
<p>
Search box located in the upper right corner of table can search everthing shows in the table.
</p>
<p>
<strong>
  How to search in orthocowdb?
</strong>
</p>
<p>
In the Home page, the search box is located in the center of page. It can search Bos taurus Ensemble gene id, gene name, GO term ID and GO term name.
After on search query, the search box will show in the left upper corner of the page.
</p>
<strong>
How to export data?
</strong>
</p>
<p>
The export botton is located in the right corner below the table. There are four export options: export the entire database, export the current table, export the data only with existing annotations and export the data only with new annotation.
</p>
<p>
<strong>
What is GO level?
</strong>
</p>
<p>

</p>
<br>
<h4 id="list-item-6"><font size="6">References</font></h4>
<font size="4">
<p>
<p>Altenhoff, A.M., Glover, N.M., Train, C.-M., Kaleb, K., Warwick Vesztrocy, A., Dylus, D., de Farias, T.M., Zile, K., Stevenson, C., Long, J., Redestig, H., Gonnet, G.H., Dessimoz, C., 2017. The OMA orthology database in 2018: retrieving evolutionary relationships among all domains of life through richer web and programmatic interfaces. Nucleic Acids Res. 46, D477–D485. https://doi.org/10.1093/nar/gkx1019</p>
<p>Fitch, W.M., 1970. Distinguishing homologous from analogous proteins. Syst. Zool. 19, 99–113.</p>
<p>Frankish, A., Vullo, A., Zadissa, A., Yates, A., Thormann, A., Parker, A., Gall, A., Moore, B., Walts, B., Aken, B.L., Cummins, C., Girón, C.G., Ong, C.K., Sheppard, D., Staines, D.M., Murphy, D.N., Zerbino, D.R., Ogeh, D., Perry, E., Haskell, E., Martin, F.J., Cunningham, F., Riat, H.S., Schuilenburg, H., Sparrow, H., Lavidas, I., Loveland, J.E., To, J.K., Mudge, J., Bhai, J., Taylor, K., Billis, K., Gil, L., Haggerty, L., Gordon, L., Amode, M.R., Ruffier, M., Patricio, M., Laird, M.R., Muffato, M., Nuhn, M., Kostadima, M., Langridge, N., Izuogu, O.G., Achuthan, P., Hunt, S.E., Janacek, S.H., Trevanion, S.J., Hourlier, T., Juettemann, T., Maurel, T., Newman, V., Akanni, W., McLaren, W., Liu, Z., Barrell, D., Flicek, P., 2017. Ensembl 2018. Nucleic Acids Res. 46, D754–D761. https://doi.org/10.1093/nar/gkx1098</p>
<p>Koonin, E. V, 2005. Orthologs, paralogs, and evolutionary genomics. Annu. Rev. Genet. 39, 309–338.</p>
<p>Letunic, I., Bork, P., 2016. Interactive tree of life (iTOL) v3: an online tool for the display and annotation of phylogenetic and other trees. Nucleic Acids Res. 44, W242–W245.</p>
<p>Niskanen, S., Östergård, P.R.J., 2003. Cliquer User’s Guide: Version 1.0. Helsinki University of Technology Helsinki, Finland.</p>
<p>Östergård, P.R.J., 2002. A fast algorithm for the maximum clique problem. Discret. Appl. Math. 120, 197–207.</p>
</p>
<br>
<h4 id="list-item-7"><font size="6">Downloads</font></h4>
<br>
<font size="4">


<strong><p>Orthologs data (Ensembl and OMA) of each pair of animal species</p></strong>
<p><a href="./data/Orthologs.zip" target="_blank">Orthologs.zip</a></p>

<br>

<strong><p>Entire databse in sql file</p></strong>
<a href="./data/orthocowdb.zip" target="_blank">orthocowdb.sql</a>
</font>

</div>
</main>
</div>
</div>

<br>
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