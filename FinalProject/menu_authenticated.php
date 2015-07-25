<?php
	echo '<nav class="navbar navbar-default">
  			 <div class="container-fluid">
  
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		        <ul class="nav navbar-nav">
		            <li class="dropdown">
		              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Shop by Category <span class="caret"></span></a>
		              <ul class="dropdown-menu">
		                <li><a href="#">Men\'s Apparel</a></li>
		                <li><a href="#">Women\'s Apparel</a></li>
		                <li><a href="#">Children\'s Apparel</a></li>
		                <li role="separator" class="divider"></li>
		                <li><a href="#">Find Something Random!</a></li>
		                <li role="separator" class="divider"></li>
		                <li><a href="#">Finest Programmer Accessories!</a></li>
		              </ul>
		            </li>
		        </ul>
		        <form class="navbar-form navbar-left" role="search" method="post" action="search.php">
		           <input type="text" class="form-control input-large" placeholder="Search..." name="search" id="searchBar">
		           <button type="submit" class="btn btn-default">Find It!</button>
		        </form>
		      <ul class="nav navbar-nav navbar-right">
		        <li><a href="Main.php">Home  <span class="glyphicon glyphicon-home" aria-hidden="true"></span> 
		        <li><a href="#">Cart  <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>  <span class="badge" id="loot">0</span></a></li>
		        <li><a href="#">Welcome '. $_SESSION['name'] . '!</a></li>
		        <li><a href="logout.php">Log Out</a></li>
		      </ul>
		    </div>
		  </div>
		</nav>';
?>