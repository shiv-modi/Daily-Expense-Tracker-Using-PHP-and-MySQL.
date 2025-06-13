<?php
session_start();
error_reporting(0);
include('database.php');
if (strlen($_SESSION['detsuid'] == 0)) {
  header('location:logout.php');
} else {
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
          <a href="home.php">
            <i class='bx bx-grid-alt'></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="add-expenses.php">
            <i class='bx bx-box'></i>
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
          <a href="manage-lending.php">
            <i class='bx bx-coin-stack'></i>
            <span class="links_name">Manage lending</span>
          </a>
        </li>
        <li>
          <a href="analytics.php">
            <i class='bx bx-pie-chart-alt-2'></i>
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
            <i class='bx bx-cog'></i>
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


        <?php
        $uid = $_SESSION['detsuid'];
        $ret = mysqli_query($db, "select name  from users where id='$uid'");
        $row = mysqli_fetch_array($ret);
        $name = $row['name'];

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
          <div class="col-md-12">
            <br>
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-md-6">
                    <h4 class="card-title">Report</h4>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <form id="reportForm" method="GET">
                  <div class="form-group">
                    <label for="reportType">Report Type</label>
                    <select class="form-control" id="reportType" name="reportType" required>
                      <option value="" selected disabled>Select a report type</option>
                      <option value="expense">Expense Report</option>
                      <option value="pending">Pending Report</option>
                      <option value="received">Received Report</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="startDate">Start Date</label>
                    <input type="date" class="form-control" id="startDate" name="startDate" required>
                  </div>
                  <div class="form-group">
                    <label for="endDate">End Date</label>
                    <input type="date" class="form-control" id="endDate" name="endDate" required>
                  </div>
                  <button type="submit" name="generateReport" class="btn btn-primary">Generate Report</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php
      session_start();

      if (isset($_GET['generateReport'])) {
        $reportType = $_GET['reportType'];
        $startDate = $_GET['startDate'];
        $endDate = $_GET['endDate'];

        if ($reportType === 'expense') {
          echo "<script>window.location.href='expense-report.php?startDate=$startDate&endDate=$endDate';</script>";
        } else if ($reportType === 'pending') {
          echo "<script>window.location.href='pending-report.php?startDate=$startDate&endDate=$endDate';</script>";
        } else if ($reportType === 'received') {
          echo "<script>window.location.href='received-report.php?startDate=$startDate&endDate=$endDate';</script>";
        }

        // Set a session variable to track if the page was already refreshed
        $_SESSION['reportGenerated'] = true;
      }

      // Check if the session variable is set to true and refresh the page only once
      if (isset($_SESSION['reportGenerated']) && $_SESSION['reportGenerated'] === true) {
        echo '<meta http-equiv="refresh" content="0;url=' . htmlspecialchars($_SERVER['PHP_SELF']) . '" />';
        unset($_SESSION['reportGenerated']); // Reset the session variable
      }
      ?>


    </section>

    <script>
      let sidebar = document.querySelector(".sidebar");
      let sidebarBtn = document.querySelector(".sidebarBtn");
      sidebarBtn.onclick = function() {
        sidebar.classList.toggle("active");
        if (sidebar.classList.contains("active")) {
          sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else
          sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
      }
    </script>
  <?php } ?>