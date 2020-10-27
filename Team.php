<!doctype html>
<html>
<head>
<!--css-->
<link rel="stylesheet" href="./bootstrap-4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!--scripts-->
<script type="text/javascript" language="javascript" src="./jQuery-3.3.1/jquery-3.3.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="./bootstrap-4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<style>

body {
  color: #5a5a5a;
}

/* Center align the text within the three columns below the carousel */
.team .col-lg-4 {
  margin-top: 2.5rem;
  margin-bottom: 1.5rem;
  text-align: center;
}
.team {
  font-weight: 400;
}
.team .col-lg-4 p {
  margin-right: .75rem;
  margin-left: .75rem;
  text-align: left;
}




.footer {
  margin:-150px;
  padding:0px;
  position: absolute;
  bottom: -800px;
  width: 100%;
  height: 70px; /* Set the fixed height of the footer here */
  line-height: 60px; /* Vertically center the text there */
  background-color: #f5f5f5;
  text-align: center;
}
html {
  transform: scale(0.75);
  height:10px;
}
</style>
</head>

<body>



<center><img src="./images/logo.png" width="15%" height="15%"></center>

<nav class="navbar navbar-expand-lg rounded navbar-light bg-light rounded">

<div class="collapse navbar-collapse justify-content-md-center style=" style="height: 20px;">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="./index.php">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item active">
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




  <div class="container team">
    <!-- Three columns of text below the carousel -->
    <div class="row">
    <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle mx-2" width="200" height="200" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em"></text></svg>
        <h2>Rui Huang</h2>
        <br>
        <p><font size=5>Role in project: </font></p> 
        <p> Master of Bioinformatics student, main developer</p>
        <font size=5><p>Position/Role:</p></font>
        <p>Master of Bioinformatics student, University of Guelph</p>
        <font size=5><p>Contact:</p></font>
        <p><img src = "./images/email.png"></p>
        
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <img src = "./images/image_dt.png">
        <h2>Dr. Dan Tulpan</h2>
        <br>
        <p><font size=5>Role in project: </font></p> 
        <p> Project advisor</p>
        <font size=5><p>Position/Role:</p></font>
        <p>Assistant Professor, Animal Bioscience, University of Guelph</p>
        <p>Adjunct Professor, School of Computer Science, University of Guelph</p>
        <font size=5><p>Contact:</p></font>
        <p><img src = "./images/dt_email.png"></p>
        
        <a role="button" href="http://animalbiosciences.uoguelph.ca/abscpeople/dtulpan" class="btn btn-secondary" target="_blank" >More</a>    
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
      <img src = "./images/image_sf.png">
        <h2>Dr. Flavio Schenkel</h2>
        <br>
        <p><font size=5>Role in project: </font></p> 
        <p> Project co-advisor</p>

        <font size=5><p>Position/Role:</p></font>
        <p>Director of the Centre for Genetic Improvement of Livestock, University of Guelph</p>
        <p>Professor, Animal Bioscience, University of Guelph</p>
        <font size=5><p>Contact:</p></font>
        <p><img src = "./images/sf_email.png"></p>


        <a role="button" href="http://animalbiosciences.uoguelph.ca/abscpeople/schenkel" class="btn btn-secondary" target="_blank">More</a> 
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->


<!-- footer -->
<footer class="footer">
      <div class="container">
      <small> Copyright &copy; <script>document.write(new Date().getFullYear())</script>
 Rui Huang. All Right Reserved</small>
      </div>
    </footer>


</body>

</html>