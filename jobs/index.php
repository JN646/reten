<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/reten/config/DBconfig.php");		// Include config file
include($_SERVER["DOCUMENT_ROOT"] . "/reten/partials/header.php");			// Load Header
session_start();															// Initialise the session
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){			// If session variable is not set it will redirect to login page
  header("location: http://localhost/reten/admin/login.php");
  exit;

$username = $_SESSION['username'];
  
// Attempt select query execution
$sql_users = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($mysqli, $sql);
$rs = mysqli_fetch_array($result);

$call_group = $rs['call_group'];

} ?>
<head><title>Jobs</title></head>
<body>
<div class="container-fluid">
	<div class="col-md-12">
		<div class="row">
			<?php include($_SERVER["DOCUMENT_ROOT"] . "/reten/partials/nav.php"); ?>
			<div class="col-md-11">
				<h1 class="display-4">Jobs</h1>
				<div class="row">
					<div class="col-md-9">
						<h5>Tools</h5>
						<ul class="nav">
							<li class="nav-item"><a class="nav-link" href="<?php echo $environment; ?>jobs/add_contact.php">Add Job</a></li>
							<li class="nav-item"><a class="nav-link" href="#" id='trigger'>Preview</a></li>
						</ul>
					</div>
					<div class="col-md-3 border border-success">
						<h5>Filters</h5>
						<div class="form-check form-check-inline"><label class="form-check-label"><input class="form-check-input" id="inlineCheckbox1" onkeyup="myFunction()" type="checkbox" value="Purple">Purple</label></div>
						<div class="form-check form-check-inline"><label class="form-check-label"><input class="form-check-input" id="inlineCheckbox2" type="checkbox" value="Red">Red</label></div>
						<div class="form-check form-check-inline"><label class="form-check-label"><input class="form-check-input" id="inlineCheckbox3" type="checkbox" value="Yellow">Yellow</label></div>
						<div class="form-check form-check-inline"><label class="form-check-label"><input class="form-check-input" id="inlineCheckbox2" type="checkbox" value="Green">Green</label></div>
					</div>
				</div><br>
				<?php
				// Attempt select query execution
				$username = $_SESSION['username'];
				  
				// Attempt select query execution
				$sql_users = "SELECT * FROM users WHERE username='$username'";
				$result = mysqli_query($mysqli, $sql_users);
				$rs = mysqli_fetch_array($result);

				$call_group = $rs['call_group'];

				$sql = "SELECT * FROM client_info WHERE client_group = '$call_group'";
				if($result = mysqli_query($mysqli, $sql)){
				    if(mysqli_num_rows($result) > 0){
				        echo "<table id='table_search' class='table table-bordered'>";
				            echo "<tr>";
				                echo "<th class='text-center' style='width: 5px'></th>";
				                echo "<th width='16' class='text-center'>Full</th>";
				                echo "<th class='text-center' onclick='sortTable(1)'>Name</th>";
				                echo "<th class='text-center' onclick='sortTable(3)'>Age</th>";
				                echo "<th class='text-center' onclick='sortTable(4)'>Address</th>";
				                echo "<th class='text-center' onclick='sortTable(5)'>Phone</th>";
				                echo "<th class='text-center' onclick='sortTable(6)'>Email</th>";
				                echo "<th class='text-center' onclick='sortTable(7)'>Provider</th>";
				                echo "<th class='text-center' onclick='sortTable(8)'>Policy #</th>";
				                echo "<th class='text-center' onclick='sortTable(9)'>Worth</th>";
				                echo "<th width='16' class='text-center'>Notes</th>";
				                echo "<th width='16' class='text-center'>Process</th>";
				            echo "</tr>";
				        while($row = mysqli_fetch_array($result)){
				            echo "<tr>";
								// Colour coding groups.
								if($row['client_group'] == 'GREEN'){
									echo "<td class='text-center' style='background-color: #d9ffcc; color: #d9ffcc'; width: 5px></td>";
								}
								// if red.
								else if($row['client_group'] == 'RED'){
									echo "<td class='text-center' style='background-color: #ffcccc; color: #ffcccc'; width: 5px></td>";
								}
								// If yellow.
								else if($row['client_group'] == 'YELLOW'){
									echo "<td class='text-center' style='background-color: #ffffcc; color: #ffffcc'; width: 5px></td>";
								}
								// If purple.
								else if($row['client_group'] == 'PURPLE'){
									echo "<td class='text-center' style='background-color: #e6ccff; color: #e6ccff'; width: 5px></td>";
								}
								// Client profile.
				                echo "<td class='text-center'><a href=#".$row['client_id']."><img src='../img/profile.png' alt='Profile' width='24' height='24'></a></td>";
								// Combined first and last name fields.
				                echo "<td>(Title) " . $row['client_fname'] . " " . $row['client_lname'] . "</td>";
								// Client age.
								// TODO Check NULL
				                echo "<td class='text-center'>" . $row['client_age'] . "</td>";
								// Client address.
								// TODO Check NULL
				                echo "<td>34 Address Street, Town, County, XX000XX</td>";
								// Client phone.
								// TODO Check NULL
				                echo "<td>07700000000</td>";
								// Client email.
								// TODO Check NULL
				                echo "<td>MyEmail@DomainName.co.uk</td>";
								// Client provider.
				                echo "<td>" . $row['client_provider'] . "</td>";
								// Client policy number.
				                echo "<td>" . $row['client_policynum'] . "</td>";
								// Client policy worth.
				                echo "<td class='text-center'><p>£" . $row['client_policyworth'] . "</p></td>";
								// Client notes.
				                echo "<td class='text-center'><a href=#".$row['client_id']." data-toggle='modal' data-target='#exampleModal'><img src='../img/writing.png' alt='Notes' width='24' height='24'></a></td>";
								// Client process.
				                echo "<td class='text-center'><a href=#".$row['client_id']."><img src='../img/flag.png' alt='Process' width='24' height='24'></a></td>";
				            echo "</tr>";
				        }
				        echo "</table>";
				        // Free result set.
				        mysqli_free_result($result);
				    } else{
				        echo "No jobs were found.";
				    }
				} else{
				    echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
				}
				// Close connection
				mysqli_close($mysqli);
				?>
				<div class='sidebar' id='slider'>
					<h3>PREVIEW</h3>
					<h5>Name</h5>
					<ul class="nav flex-column">
						<li class="nav-item">[Title], [FName] [LName]</li>
					</ul>
					<hr>
					<h5>Contact</h5>
					<ul class="nav flex-column">
						<li class="nav-item">[Addr1], [Addr2], [Addr3], [County], [Postcode]</li>
						<li class="nav-item">[Hom], [Mob], [Email]</li>
					</ul>
					<hr>
					<h5>Policy</h5>
					<ul class="nav flex-column">
						<li class="nav-item">[Provider], [Policy], [Number], [Worth], [CallType]</li>
					</ul>
				</div>
				<script type="text/javascript">
					// Sliding sidebar.
					$("#slider").slideReveal({	// Set div to slide.
					trigger: $("#trigger"),		// Set item to act as trigger.
					position: "right",			// Set positioning.
					push: false,				// Disable content push.
					});
					// Search and filter data.
					function myFunction() {
						// declare variables.
						var input, filter, ul, li, a, i;
						// set values to variables.
						input = document.getElementById("myInput"); // search field ID.
						filter = input.value.toUpperCase();
						ul = document.getElementById("table_search"); // table ID.
						li = ul.getElementsByTagName("li");
						// Search loop.
						for (i = 0; i < li.length; i++) {
							a = li[i].getElementsByTagName("a")[6]; // set the column to search by.
							if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
								li[i].style.display = "";
							} else {
								li[i].style.display = "none"; // remove bullets.
							}
						}
					}
				</script>
			</div>
		</div>
	</div>
</div>
<?php include($_SERVER["DOCUMENT_ROOT"] . "/reten/partials/footer.php"); ?>