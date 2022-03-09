<?php

session_start();
require_once '../config/db.php';
if (!isset($_SESSION['admin_login'])) {
  $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
  header('location: ../login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors" />
    <meta name="generator" content="Hugo 0.88.1" />
    <title>Admin Page</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sidebars/" />

    <!-- Bootstrap core CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />

    <!-- Custom styles for this template -->
    <link href="sidebars.css" rel="stylesheet" />
  </head>
  <body>

    <?php

    if (isset($_SESSION['admin_login'])) {
      $user_id = $_SESSION['admin_login'];
      $stmt = $conn->query("SELECT * FROM users WHERE id = $user_id");
      $stmt->execute();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    ?>

    <main>
      <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px">
        <a
          href="/"
          class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none"
        >
          <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap" /></svg>
          <span class="fs-4">Admin Page</span>
        </a>
        <hr />
        <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav-item">
            <a href="index.php" class="nav-link active bg-warning text-black" aria-current="page">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="20"
                height="20"
                fill="currentColor"
                class="bi bi-house me-2"
                viewBox="0 0 16 16"
              >
                <path
                  fill-rule="evenodd"
                  d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"
                />
                <path
                  fill-rule="evenodd"
                  d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"
                />
              </svg>
              Dashboard
            </a>
          </li>
          <li>
            <a href="statement.php" class="nav-link text-white">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="20"
                height="20"
                fill="currentColor"
                class="bi bi-bar-chart me-2"
                viewBox="0 0 16 16"
              >
                <path
                  d="M4 11H2v3h2v-3zm5-4H7v7h2V7zm5-5v12h-2V2h2zm-2-1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1h-2zM6 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm-5 4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3z"
                />
              </svg>
              Statement
            </a>
          </li>
          <li>
            <a href="course.php" class="nav-link text-white">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="20"
                height="20"
                fill="currentColor"
                class="bi bi-layout-text-sidebar-reverse me-2"
                viewBox="0 0 16 16"
              >
                <path
                  d="M12.5 3a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1h5zm0 3a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1h5zm.5 3.5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5zm-.5 2.5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1h5z"
                />
                <path
                  d="M16 2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2zM4 1v14H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h2zm1 0h9a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5V1z"
                />
              </svg>
              Course
            </a>
          </li>
          <li>
            <a href="member.php" class="nav-link text-white">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="20"
                height="20"
                fill="currentColor"
                class="bi bi-people me-2"
                viewBox="0 0 16 16"
              >
                <path
                  d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"
                />
              </svg>
              Member
            </a>
          </li>
          <li>
            <a href="trainer.php" class="nav-link text-white">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="20"
                height="20"
                fill="currentColor"
                class="bi bi-person-bounding-box me-2"
                viewBox="0 0 16 16"
              >
                <path
                  d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z"
                />
                <path
                  d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"
                />
              </svg>
              Trainer
            </a>
          </li>
        </ul>
        <hr />
        <div class="dropdown">
          <a
            href="#"
            class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
            id="dropdownUser1"
            data-bs-toggle="dropdown"
            aria-expanded="false"
          >
            <img
              src="https://github.com/mdo.png"
              alt=""
              width="32"
              height="32"
              class="rounded-circle me-2"
            />
            <strong><?php echo $row['firstname'] ?></strong>
          </a>
          <ul
            class="dropdown-menu dropdown-menu-dark text-small shadow"
            aria-labelledby="dropdownUser1"
          >
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><hr class="dropdown-divider" /></li>
            <li><a class="dropdown-item" href="../config/logout.php">Sign out</a></li>
          </ul>
        </div>
      </div>

      <div class="b-example-divider"></div>

      <div class="container mt-3">
        <h1 class="h2">Dashboard</h1>
        <p>Welcome Admin, <?php echo $row['firstname'] . ' ' . $row['lastname'] ?></p>
        <div class="row my-4">
          <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
            <div class="card">
              <h5 class="card-header">Customers</h5>
              <div class="card-body">
                <h5 class="card-title">345k</h5>
                <p class="card-text">Feb 1 - Apr 1, United States</p>
                <p class="card-text text-success">18.2% increase since last month</p>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
            <div class="card">
              <h5 class="card-header">Revenue</h5>
              <div class="card-body">
                <h5 class="card-title">$2.4k</h5>
                <p class="card-text">Feb 1 - Apr 1, United States</p>
                <p class="card-text text-success">4.6% increase since last month</p>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
            <div class="card">
              <h5 class="card-header">Purchases</h5>
              <div class="card-body">
                <h5 class="card-title">43</h5>
                <p class="card-text">Feb 1 - Apr 1, United States</p>
                <p class="card-text text-danger">2.6% decrease since last month</p>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
            <div class="card">
              <h5 class="card-header">Traffic</h5>
              <div class="card-body">
                <h5 class="card-title">64k</h5>
                <p class="card-text">Feb 1 - Apr 1, United States</p>
                <p class="card-text text-success">2.5% increase since last month</p>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12 col-xl-12 mb-4 mb-lg-0">
            <div class="card">
              <h5 class="card-header">Latest transactions</h5>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Description</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Total</th>
                        <th scope="col">Date</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">17371705</th>
                        <td>Volt Premium Bootstrap 5 Dashboard</td>
                        <td>johndoe@gmail.com</td>
                        <td>€61.11</td>
                        <td>Aug 31 2020</td>
                        <td><a href="#" class="btn btn-sm btn-primary">View</a></td>
                      </tr>
                      <tr>
                        <th scope="row">17370540</th>
                        <td>Pixel Pro Premium Bootstrap UI Kit</td>
                        <td>jacob.monroe@company.com</td>
                        <td>$153.11</td>
                        <td>Aug 28 2020</td>
                        <td><a href="#" class="btn btn-sm btn-primary">View</a></td>
                      </tr>
                      <tr>
                        <th scope="row">17371705</th>
                        <td>Volt Premium Bootstrap 5 Dashboard</td>
                        <td>johndoe@gmail.com</td>
                        <td>€61.11</td>
                        <td>Aug 31 2020</td>
                        <td><a href="#" class="btn btn-sm btn-primary">View</a></td>
                      </tr>
                      <tr>
                        <th scope="row">17370540</th>
                        <td>Pixel Pro Premium Bootstrap UI Kit</td>
                        <td>jacob.monroe@company.com</td>
                        <td>$153.11</td>
                        <td>Aug 28 2020</td>
                        <td><a href="#" class="btn btn-sm btn-primary">View</a></td>
                      </tr>
                      <tr>
                        <th scope="row">17371705</th>
                        <td>Volt Premium Bootstrap 5 Dashboard</td>
                        <td>johndoe@gmail.com</td>
                        <td>€61.11</td>
                        <td>Aug 31 2020</td>
                        <td><a href="#" class="btn btn-sm btn-primary">View</a></td>
                      </tr>
                      <tr>
                        <th scope="row">17370540</th>
                        <td>Pixel Pro Premium Bootstrap UI Kit</td>
                        <td>jacob.monroe@company.com</td>
                        <td>$153.11</td>
                        <td>Aug 28 2020</td>
                        <td><a href="#" class="btn btn-sm btn-primary">View</a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <a href="#" class="btn btn-block btn-light">View all</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>

    <script src="sidebars.js"></script>
  </body>
</html>
