<style>
    
.menu{
  height: 70px;
  background-color: #ff5500;
}

.menu ul{
  width: auto;
  float: left;
}

.menu li{
  display: flex;
  align-items: center;
  margin-top: 10px;
  margin-left: 40px;
  justify-content: center;
  align-items: center;
  float: left;
}

.nav{
  padding: auto;
  color: #000000;
  text-decoration: none;
  font-family: 'Open Sans', sans-serif;
  font-size: 1.2vw;
  margin-bottom: 6px;
  padding-left: 100px; 
  position: sticky;
   top: 0;
   z-index: 100;
}

#verhuur{
    text-align: right;
}

</style>
<div class="menu">
        <nav>
            <ul>
                <li><a href="fietsen.php" class="nav">Fietsen</a></li>
				<li><a href="klant.php" class="nav">klanten</a></li>
                <li><a href="merk.php" class="nav">Merken</a></li>
                <li><a href="status.php" class="nav">Statusen</a></li>
                <li><a href="verhuringen.php" class="nav">Verhuringen</a></li>
                <li id="verhuur"><a href="verhuur.php" class="nav">Verhuur Pagina</a></li>
            </ul>
		</nav>
</div>