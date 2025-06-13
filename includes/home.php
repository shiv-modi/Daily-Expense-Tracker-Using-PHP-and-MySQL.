
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
          <a href="#" class="active">
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
          <a href="add-income.php">
            <i class='bx bx-box'></i>
            <span class="links_name">Income</span>
          </a>
        </li>
        <li>
          <a href="manage-transaction.php">
            <i class='bx bx-list-ul'></i>
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
          <a href="report.php">
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
        <span class="dashboard">Dashboard</span>
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

    <div class="home-content">
      <div class="overview-boxes">

      <!-- Today Expense -->

      <div class="box">
  <div class="right-side">
    <div class="box-topic">Today Expense</div>

    <?php
      //Today Expense
      $userid=$_SESSION['detsuid'];
      $tdate=date('Y-m-d');
      $query=mysqli_query($db,"select sum(ExpenseCost) as todaysexpense from tblexpense where (ExpenseDate)='$tdate' && (UserId='$userid');");
      $result=mysqli_fetch_array($query);
      $sum_today_expense=$result['todaysexpense'];
    ?> 

    <div class="number"  data-percent="<?php echo $sum_today_expense;?>">
      <?php if($sum_today_expense=="") {
        echo "0";
      } else {
        echo $sum_today_expense;
      } ?>
    </div>
    <div class="indicator">
      <i class='bx bx-up-arrow-alt'></i>
      <span class="text">Up from Today</span>
    </div>
  </div>
  <i class='fas fa-circle-plus cart'></i>
 
</div>





 <!-- yesterday expense Box-->


        <div class="box">
          <div class="right-side">
            <div class="box-topic">Yesterday Expense</div>

            <?php
            //Yestreday Expense
            $userid=$_SESSION['detsuid'];
            $ydate=date('Y-m-d',strtotime("-1 days"));
            $query1=mysqli_query($db,"select sum(ExpenseCost)  as yesterdayexpense from tblexpense where (ExpenseDate)='$ydate' && (UserId='$userid');");
            $result1=mysqli_fetch_array($query1);
            $sum_yesterday_expense=$result1['yesterdayexpense'];
            ?> 

            <div class="number" data-percent="<?php echo $sum_yesterday_expense;?>"><?php if($sum_yesterday_expense==""){
            echo "0";
            } else {
            echo $sum_yesterday_expense;
            }?></div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from yesterday</span>
            </div>
          </div>
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-Y5Oh6F67GY6j+o6lYzZJm+ZeEj9m1ydIGe19q3JV1lk4/4gBVwuP8jwWQ2NfhzJdZtg9tyI8cFk3qTEwhG4sg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


          <i class="fas fa-wallet cart two"></i>



        </div>


  <!-- MONTH expense Box -->
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Last 30 day Expense</div>

            <?php
            //Monthly Expense
            $userid=$_SESSION['detsuid'];
            $monthdate=  date("Y-m-d", strtotime("-1 month")); 
            $crrntdte=date("Y-m-d");
            $query3=mysqli_query($db,"select sum(ExpenseCost)  as monthlyexpense from tblexpense where ((ExpenseDate) between '$monthdate' and '$crrntdte') && (UserId='$userid');");
            $result3=mysqli_fetch_array($query3);
            $sum_monthly_expense=$result3['monthlyexpense'];
            ?>

            <div class="number" data-percent="<?php echo $sum_monthly_expense;?>"><?php if($sum_monthly_expense==""){
          echo "0";
          } else {
          echo $sum_monthly_expense;
          }

            ?></div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
              <span class="text">Up from Last 30 day</span>
            </div>
          </div>
          <i class='fas fa-history cart three' ></i>
        </div>

  <!-- Total expense Box-->
        
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Expense</div>

            <?php
            //Yearly Expense
            $userid=$_SESSION['detsuid'];
            $query5=mysqli_query($db,"select sum(ExpenseCost)  as totalexpense from tblexpense where UserId='$userid';");
            $result5=mysqli_fetch_array($query5);
            $sum_total_expense=$result5['totalexpense'];
            ?>

            <div class="number" data-percent="<?php echo $sum_total_expense;?>"><?php if($sum_total_expense==""){
            echo "0";
            } else {
            echo $sum_total_expense;
            }

              ?></div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt up'></i>
              <span class="text">Up from Year</span>
            </div>
          </div>
          <i class='fas fa-piggy-bank cart four' ></i>
        </div>
      </div>




<div class="card">
  <div class="card-header">
    <h5 class="card-title">Expense Chart</h5>
  </div>
  <div class="card-body">
    
    <canvas id="myChart"></canvas>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?php
if (!$db) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get initial data for the chart
$userid = $_SESSION['detsuid'];
$query = mysqli_query($db, "SELECT ExpenseDate, SUM(ExpenseCost) as total_cost FROM tblexpense WHERE UserId='$userid' AND ExpenseDate > DATE_SUB(NOW(), INTERVAL 30 day) GROUP BY ExpenseDate");
$data = array();
$labels = array();
while ($result = mysqli_fetch_array($query)) {
  $data[] = (float) $result['total_cost'];
  $labels[] = date('Y-m-d', strtotime($result['ExpenseDate']));
}
?>

<script>
var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: <?php echo json_encode($labels); ?>,
    datasets: [{
      label: 'Expenses',
      data: <?php echo json_encode($data); ?>,
      backgroundColor: [
      'rgba(255, 99, 132, 0.5)', // red
      'rgba(54, 162, 235, 0.5)', // blue
      'rgba(255, 206, 86, 0.5)', // yellow
      'rgba(75, 192, 192, 0.5)', // green
      'rgba(153, 102, 255, 0.5)', // purple
      'rgba(255, 159, 64, 0.5)', // orange
      'rgba(255, 0, 0, 0.5)',    // bright red
      'rgba(0, 255, 0, 0.5)'     // bright green
    ],
    borderColor: [
      'rgba(255, 99, 132, 1)',
      'rgba(54, 162, 235, 1)',
      'rgba(255, 206, 86, 1)',
      'rgba(75, 192, 192, 1)',
      'rgba(153, 102, 255, 1)',
      'rgba(255, 159, 64, 1)',
      'rgba(255, 0, 0, 1)',
      'rgba(0, 255, 0, 1)'
    ],

      borderWidth: 1,
      hoverBackgroundColor: [
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)',
        'rgba(255, 0, 0, 1)',
        'rgba(0, 255, 0, 1)'
        ]
    }],
  },
  options: {
    scales: {
      xAxes: [{
        type: 'time',
        time: {
          unit: 'day',
          tooltipFormat: 'll'
        },
        ticks: {
          source: 'auto'
        }
      }],
      yAxes: [{
        ticks: {
          beginAtZero: true
        },
        scaleLabel: {
          display: true,
          labelString: 'Expense Cost'
        }
      }]
    },
    animation: {
      duration: 1000,
      easing: 'easeInOutQuad'
    },
    legend: {
      display: false
    },
    tooltips: {
      enabled: false
    },
    hover: {
      mode: 'nearest',
      intersect: true
    },
    responsive: true,
    maintainAspectRatio: false
  }
});

  var ctx = document.getElementById('myChart').getContext('2d');
  var chart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: <?php echo json_encode($labels); ?>,
      datasets: [{
        label: 'Expenses',
        data: <?php echo json_encode($data); ?>,
        backgroundColor: 'rgba(224, 82, 96, 0.5)',
        borderColor: '#e05260',
        borderWidth: 1
      }]
    },
    options: options
  });

  // Function to update chart data
  function updateChartData() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var new_data = JSON.parse(this.responseText);
        chart.data.datasets[0].data = new_data;
        chart.update();
      }
    };
    xmlhttp.open("GET", "get_data.php", true);
    xmlhttp.send();
  }

  // Call updateChartData function every 5 seconds to update chart data
  setInterval(updateChartData, 5000);
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>




<style>
canvas {
  width: 100%;
  height: auto;
}

.card {
  border: 1px solid #ddd;
  border-radius: 5px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  margin: 20px;
  padding: 20px;
  background-color: #fff;
  height: 500px;
}
.card1 {
  border: 1px solid #ddd;
  border-radius: 5px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  margin: 20px;
  padding: 20px;
  background-color: #fff;
}

.card-header {
  background-color: #f7f7f7;
  border-bottom: 1px solid #ddd;
  margin-bottom: 20px;
  padding: 10px;
}

.card-title {
  font-size: 24px;
  font-weight: bold;
  margin: 0;
}

.card-body {
  padding: 0;
}

@media (max-width: 768px) {
  .card {
    margin: 10px;
    padding: 10px;
  }

  .card-title {
    font-size: 20px;
  }
}

</style>




<div class="card1">
  <div class="card-header">
    <h5 class="card-title">Category Table</h5>
  </div>
  <div class="card-body">
    <table class="table">
      <thead>
        <tr>
          <th>Percentage</th>
          <th>Category</th>
          <th>Amount</th>
        </tr>
      </thead>
      <tbody id="expense-table-body"></tbody>
      <tfoot>
        <tr>
          <th></th>
          <th>Total</th>
          <th>Rs. <span id="total-expense"></span></th>
        </tr>
      </tfoot>
    </table>
  </div>
</div>

<script>
fetch('pie-data.php')
  .then(response => response.json())
  .then(data => {
    const total = data.reduce((acc, curr) => acc + curr.total_expense, 0);
    const colors = ['#FF6384', '#36A2EB', '#FFCE56', '#8E44AD', '#3498DB', '#FFA07A', '#6B8E23', '#FF00FF', '#FFD700', '#00FFFF'];
    const rows = data.map((item, i) => {
      const percentage = ((item.total_expense / total) * 100).toFixed(2);
      const color = colors[i % colors.length];
      const badgeClass = 'badge badge-pill badge-primary';
      return `
        <tr>
          <td><span class="${badgeClass}" style="background-color: ${color}">${percentage}%</span></td>
          <td>${item.category}</td>
          <td>Rs. ${item.total_expense.toFixed(2)}</td>
        </tr>
      `;
    }).join('');
    document.getElementById('expense-table-body').innerHTML = rows;
    document.getElementById('total-expense').innerHTML = total.toFixed(2);
  });
</script>


<style>
  .table {
    border-collapse: collapse;
    width: 100%;
    font-size: 16px;
    text-align: left;
  }

  .table th {
    background-color: #f2f2f2;
    font-weight: bold;
    padding: 10px 20px;
    border-top: 1px solid #ddd;
    border-bottom: 1px solid #ddd;
  }

  .table td {
    padding: 10px 20px;
    border-bottom: 1px solid #ddd;
  }

  .badge {
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 1px;
    padding: 5px 10px;
  }
</style>
<!-- Add Font Awesome library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-ZfSLV7XKlgtWRkec6JzT6Kjgx6UHILee0zmHXJkQAdKbZ0YirYRLfFlIaJl7lN25wyX9N7Ib2QlyeV1qZh/3Jw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Add button with Font Awesome plus icon -->
<button id="add-button" title="Add Expense">
  <i class="fas fa-plus"></i>
</button>

<style>
#add-button::before {
  content: "Add Expense";
  position: absolute;
  top: 13px;
  left: -100%;
  transform: translateX(-50%);
  background-color: rgba(0, 0, 0, 0.8);
  color: #fff;
  padding: 6px 12px;
  border-radius: 4px;
  font-size: 14px;
  opacity: 0;
  transition: opacity 0.2s ease-in-out;
}

#add-button:hover::before {
  opacity: 1;
  left: -130%;
}

#add-button {
  position: fixed;
  bottom: 24px;
  right: 24px;
  border: none;
  border-radius: 50%;
  background-color: #4285f4;
  width: 64px;
  height: 64px;
  cursor: pointer;
  display: flex;
  justify-content: center;
  align-items: center;
  box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
  transition: all 0.2s ease-in-out;
}

#add-button:hover {
  transform: translateY(-2px);
  box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
}

#add-button:active {
  transform: translateX(50px) translateY(0px);
  box-shadow: none;
}

#add-button i {
  font-size: 24px;
  color: #fff;
  transition: all 0.2s ease-in-out;
}

#add-button:hover i {
  transform: rotate(-45deg);
}

#add-button:hover {
  background-color: #000;
}

@keyframes shake {
  0% {
    transform: translateX(0);
  }
  25% {
    transform: translateX(-5px);
  }
  50% {
    transform: translateX(5px);
  }
  75% {
    transform: translateX(-5px);
  }
  100% {
    transform: translateX(0);
  }
}

#add-button:active i {
  animation: shake 0.5s ease-in-out;
}


</style>

<script src="https://kit.fontawesome.com/your-code.js" crossorigin="anonymous"></script>

<script>
const addButton = document.getElementById('add-button');

addButton.addEventListener('click', () => {
  addButton.style.transform = 'translateX(50px)';
  setTimeout(() => {
    window.location.href = "add-expenses.php";
  }, 200);
});
</script>




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

</body>
</html>

<?php } ?>