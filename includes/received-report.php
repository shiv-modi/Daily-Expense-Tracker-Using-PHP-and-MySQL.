
<?php
session_start();
error_reporting(0);
include('database.php');
if (strlen($_SESSION['detsuid']==0)) {
  header('location:logout.php');
  } else{
?>
  
  <!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <link rel="stylesheet" href="css/style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">



     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bx-album'></i>
      <span class="logo_name">Expenditure</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="home.php" >
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="add-expenses.php">
            <i class='bx bx-box' ></i>
            <span class="links_name">Expenses</span>
          </a>
        </li>
        <li>
          <a href="manage-expenses.php">
            <i class='bx bx-list-ul' ></i>
            <span class="links_name">Manage List</span>
          </a>
        </li>
        
        <li>
          <a href="lending.php">
          <i class='bx bx-money'></i>
            <span class="links_name">lending</span>
          </a>
        </li>
        <li>
        <a href="manage-lending.php" >
        <i class='bx bx-coin-stack'></i>
            <span class="links_name">Manage lending</span>
          </a>
        </li>
        <li>
          <a href="analytics.php">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">Analytics</span>
          </a>
        </li>
        <li>
          <a href="report.php" class="active">
          <i class="bx bx-file"></i>
            <span class="links_name">Report</span>
          </a>
        </li>
       <li>
       <a href="user_profile.php">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Setting</span>
          </a>
        </li>
        <li class="log_out">
          <a href="logout.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
    <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Expenditure</span>
      </div>
   
      <div class="search-box">
        <input input type="text" id="search-input" class="form-control form-control-sm mx-2" placeholder="Search...">
        <i class='bx bx-search' ></i>
</div>
<script>
$(document).ready(function() {
    var originalTableHtml = $('table tbody').html(); // Store original table HTML
    
    // Handle keyup event of search input
    $('#search-input').on('keyup', function() {
        var value = $(this).val().toLowerCase(); // Get search keyword and convert to lowercase
        var found = false;
        
        if (value) { // If search input has value
            $('table tbody tr').filter(function() { // Filter table rows based on search keyword
                var matches = $(this).text().toLowerCase().indexOf(value) > -1;
                $(this).toggle(matches); // Show or hide table rows based on search keyword
                if(matches) found = true;
            });
        } else { // If search input is empty
            $('table tbody').html(originalTableHtml); // Show original table HTML
            found = true;
        }
        
        if(!found) {
            $('table tbody').html('<tr><td colspan="7" style="text-align:center;">No data found</td></tr>');
        }
    });
});

</script>

      <?php
$uid=$_SESSION['detsuid'];
$ret=mysqli_query($db,"select name  from users where id='$uid'");
$row=mysqli_fetch_array($ret);
$name=$row['name'];

?>

      <div class="profile-details">
  <img src="images/maex.png" alt="">
  <span class="admin_name"><?php echo $name; ?></span>
  <i class='bx bx-chevron-down' id='profile-options-toggle'></i>
  <ul class="profile-options" id='profile-options'>
  <li><a href="user_profile.php"><i class="fas fa-user-circle"></i> User Profile</a></li>
    <!-- <li><a href="#"><i class="fas fa-cog"></i> Account Settings</a></li> -->
    <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
  </ul>
</div>


<script>
  const toggleButton = document.getElementById('profile-options-toggle');
  const profileOptions = document.getElementById('profile-options');
  
  toggleButton.addEventListener('click', () => {
    profileOptions.classList.toggle('show');
  });
</script>


    </nav>

<script>
function printReport() {
  // Remove the form submit event to prevent redirection
  $('#filter-form').off('submit');
  
  // Remove the URL from the report
  var url = document.URL;
  var printableContent = $('#printable').clone();
  var urlElement = printableContent.find('.url');
  if (urlElement.length) {
    urlElement.remove();
  }

  // Add table header and footer
  var tableHeader = '<table style="border-collapse: collapse; border-spacing: 0; width: 100%;">' +
                    '<thead>' +
                    '<tr style="border: 1px solid black;">' +
                    '<th style="border: 1px solid black;">S.NO</th>' +
                    '<th style="border: 1px solid black;">Date</th>' +
                    '<th style="border: 1px solid black;">Category</th>' +
                    '<th style="border: 1px solid black;">Description</th>' +
                    '<th style="border: 1px solid black;">Registered Date</th>' +
                    '<th style="border: 1px solid black;">Amount</th>' +
                    '</tr>' +
                    '</thead>' +
                    '<tbody>';
  
var tableFooter = '<tr>' +
                    '<td colspan="5" style="text-align:center; border: 1px solid black;">Grand Total &copy; 2023</td>' +
                    '<td style="border: 1px solid black;">6000</td>' +
                    '</tr>' +
                    '</tbody>' +
                    '</table>';

  
  printableContent.find('.expense-table').prepend(tableHeader).append(tableFooter);
  
  // Print the report
// Get the current date and format it as "YYYY-MM-DD"
var currentDate = new Date().toISOString().slice(0,10);

// Print the report with the current date in the title
var nw = window.open('', '_blank', 'width=900,height=600');
nw.document.write('<html><head><title>Received Report - ' + currentDate + '</title></head><body>');
  nw.document.write('<style>table {border-collapse: collapse; border-spacing: 0;} td, th {border: 1px solid black; padding: 5px;}</style>');
  nw.document.write(printableContent.html());
  nw.document.write('</body></html>');
  nw.document.close();
  nw.focus();
  setTimeout(function() {
    nw.print();
    setTimeout(function() {
      nw.close();
      end_loader();
    }, 500);
  }, 500);
}

</script>
<?php
session_start();

$fdate = $_GET['startDate'];
$tdate = $_GET['endDate'];
$rtype = $_GET['reportType'];

?>
<div class="home-content">
  <div class="overview-boxes">
    <div class="col-md-12">
      <br>
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-md-6">
              <h4 class="card-title">Received Report</h4>
            </div>
            <div class="col-md-6 text-right">
              <button class="btn btn-primary" onclick="printReport()">Print</button>
            </div>
          </div>
        </div>
        <div class="card-body" id="printable">
          <h5 align="center" style="color:blue">Received <?php echo ucfirst($rtype); ?> Report from <span style="color:red"><?php echo $fdate ?></span> to <span style="color:red"><?php echo $tdate ?></span></h5>
          <hr />
          <?php
          $userid=$_SESSION['detsuid'];
          $ret=mysqli_query($db,"SELECT name,date_of_lending,status,description,SUM(amount) as totaldaily FROM `lending`  where (date_of_lending BETWEEN '$fdate' and '$tdate') && (UserId='$userid') && (status = 'received') group by date_of_lending");
          if(mysqli_num_rows($ret) > 0) {
          ?>
          <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
              <tr>
                <th>S.NO</th>
                <th>Name</th>
                <th>Date of lending</th>
                <th>Status</th>
                <th>Description</th>
                <th><?php echo ucfirst($rtype); ?> Amount</th>
               

              </tr>
            </thead>
            <tbody>
              <?php
              $cnt=1;
              $totalsexp=0;
              while ($row=mysqli_fetch_array($ret)) {
              ?>
              <tr>
                <td><?php echo $cnt;?></td>
                <td><?php  echo $row['name'];?></td>
                <td><?php  echo $row['date_of_lending'];?></td>
                <td><?php  if ($row["status"] == "received") {
                 echo '</i> <span class="badge bg-success text-white">Received</span>';
                } else {
                 echo '<span class="badge bg-warning text-white">Pending</span>';
                        }?>
                </td>                
                <td><?php  echo $row['description'];?></td>
                <td><?php  echo $ttlsl=$row['totaldaily'];?></td>
              </tr>
              <?php
              $totalsexp+=$ttlsl; 
              $cnt=$cnt+1;
              }?>
             <tr>
            <th colspan="5" style="text-align:center">Grand Total</th>
            <td><b><?php echo number_format($totalsexp, 2); ?></b></td>
            </tr>

            </tbody>
          </table>
          <?php
          } else {
            echo "<p style='text-align:center'><b>No data found</p>";
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>



    </section>

<script>
let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
sidebar.classList.toggle("active");
if(sidebar.classList.contains("active")){
sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
</script>
<?php } ?>