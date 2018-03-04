<!-- The Modal (pop up window) -->
<div id="search" class="modal">

  <div class="modal-content" align= "center">
    <span class="close">&times;</span>
    <h2>Search Assets</h2>
    <br>
		<form action="serverAdd.php" method="GET">
			<table>
				<tr>
					<td align="left"><input type="text" name="search_value" required/></td>
				</tr>
				<tr>
					<td><br><input type="submit" name="search" value="Search" /></td>
					<td><input type="hidden" name="search" value="TRUE" /></td>
				</tr>
			</table>
		</form>
		</div>
 </div>
  
<script>

var modal = document.getElementById('search'); //get modal

var btn = document.getElementById("searchButton"); // get element that uses modal

var span = document.getElementsByClassName("close")[0]; 

btn.onclick = function()  // onclick open modal
{
    modal.style.display = "block";
}

span.onclick = function() //close modal when pressing x
{
    modal.style.display = "none";
}

window.onclick = function(event) // close modal when you click outside the model
{
    if (event.target == modal) 
        {
        modal.style.display = "none";
    }
}
</script>