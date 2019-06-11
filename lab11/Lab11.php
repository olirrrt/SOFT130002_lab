<?php
//Fill this place

//****** Hint ******
//connect database and fetch data here


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Lab11</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/bootstrap.min.css"/>


    <link rel="stylesheet" href="css/captions.css"/>
    <link rel="stylesheet" href="css/bootstrap-theme.css"/>

</head>

<body>
<?php include 'header.inc.php'; ?>


<!-- Page Content -->
<main class="container">
    <div class="panel panel-default">
        <div class="panel-heading">Filters</div>
        <div class="panel-body">
            <form action="Lab11.php" method="get" class="form-horizontal">
                <div class="form-inline">
                    <select name="continent" class="form-control" id="pre">
                        <option value="0">Select Continent</option>
                        <?php
                        //Fill this place

                        //****** Hint ******
                        //display the list of continents

                        $con = mysqli_connect("localhost:3306", "root", "12345678");
                        mysqli_select_db($con, "travel");
                        if (mysqli_connect_errno())
                            echo "连接 MySQL 失败: " . mysqli_connect_error();
                        $re = mysqli_query($con, "select * from travel.Continents ");

                        while ($row = mysqli_fetch_assoc($re)) {
                            echo '<option value=' . $row['ContinentCode'] . '>' . $row['ContinentName'] . '</option>';
                        }
                        $con->close();

                        ?>
                    </select>

                    <select name="country" class="form-control">
                        <option value="0">Select Country</option>
                        <?php
                        //Fill this place

                        //****** Hint ******
                        /* display list of countries */


                        $con = mysqli_connect("localhost:3306", "root", "12345678");
                        mysqli_select_db($con, "travel");
                        if (mysqli_connect_errno())
                            echo "连接 MySQL 失败: " . mysqli_connect_error();
                        $re = mysqli_query($con, "select * from travel.Countries ");

                        while ($row = mysqli_fetch_assoc($re)) {
                            echo '<option value=' . $row['ISO'] . '>' . $row['CountryName'] . '</option>';
                        }
                        $con->close();


                        ?>
                    </select>
                    <input type="text" placeholder="Search title" class="form-control" name=title>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </form>

        </div>
    </div>


    <ul class="caption-style-2">
        <?php
        //Fill this place

        //****** Hint ******
        /* use while loop to display images that meet requirements ... sample below ... replace ???? with field data
        <li>
          <a href="detail.php?id=????" class="img-responsive">
            <img src="images/square-medium/????" alt="????">
            <div class="caption">
              <div class="blur"></div>
              <div class="caption-text">
                <p>????</p>
              </div>
            </div>
          </a>
        </li>
        */
        if (isset($_GET['continent']) || isset($_GET['country'])) {
            $key = $_GET['continent'];
            $key2 = $_GET['country'];
            $con = mysqli_connect("localhost:3306", "root", "12345678");
            mysqli_select_db($con, "travel");
            if (mysqli_connect_errno())
                echo "连接 MySQL 失败: " . mysqli_connect_error();

           // $row_key = mysqli_fetch_assoc(mysqli_query($con, "select * from travel.Continents where ContinentName='$continent'"));
            //$key = $row_key['ContinentCode'];

            //$row_key2 = mysqli_fetch_assoc(mysqli_query($con, "select * from travel.Countries where CountryName='$country'"));
            //$key2 = $row_key2['ISO'];

            $re = mysqli_query($con, "select * from travel.ImageDetails where ContinentCode='$key'");

            while ($row = mysqli_fetch_assoc($re)) {
                $cou = $row['CountryCodeISO'];
                $row_temp = mysqli_fetch_assoc(mysqli_query($con, "select * from travel.Countries where ISO='$cou'"));
                echo "<li>
              <a href=\"detail.php?id=????\" class=\"img-responsive\">
                <img src=\"images/square-medium/" . $row['Path'] . "\" alt=\"????\">
                <div class=\"caption\">
                  <div class=\"blur\"></div>
                  <div class=\"caption-text\">
                    <p>" . $row_temp['Capital'] . "</p>
                  </div>
                </div>
              </a>
            </li>      ";
            }
            $re2 = mysqli_query($con, "select * from travel.ImageDetails where CountryCodeISO='$key2'");

            while ($row = mysqli_fetch_assoc($re2)) {
                $cou = $row['CountryCodeISO'];
                $row_temp = mysqli_fetch_assoc(mysqli_query($con, "select * from travel.Countries where ISO='$cou'"));
                echo "<li>
              <a href=\"detail.php?id=????\" class=\"img-responsive\">
                <img src=\"images/square-medium/" . $row['Path'] . "\" alt=\"????\">
                <div class=\"caption\">
                  <div class=\"blur\"></div>
                  <div class=\"caption-text\">
                    <p>" . $row_temp['Capital'] . "</p>
                  </div>
                </div>
              </a>
            </li>      ";
            }
            $con->close();
        } else {
            $con = mysqli_connect("localhost:3306", "root", "12345678");
            mysqli_select_db($con, "travel");
            if (mysqli_connect_errno())
                echo "连接 MySQL 失败: " . mysqli_connect_error();
            $re = mysqli_query($con, "select * from travel.ImageDetails ");

            while ($row = mysqli_fetch_assoc($re)) {
                $cou = $row['CountryCodeISO'];
                $row2 = mysqli_fetch_assoc(mysqli_query($con, "select * from travel.Countries where ISO='$cou'"));

                echo "<li>
          <a href=\"detail.php?id=????\" class=\"img-responsive\">
            <img src=\"images/square-medium/" . $row['Path'] . "\" alt=\"????\">
            <div class=\"caption\">
              <div class=\"blur\"></div>
              <div class=\"caption-text\">
                <p>" . $row2['Capital'] . "</p>
              </div>
            </div>
          </a>
        </li>";
            }
            $con->close();
        }
        ?>
    </ul>


</main>

<footer>
    <div class="container-fluid">
        <div class="row final">
            <p>Copyright &copy; 2017 Creative Commons ShareAlike</p>
            <p><a href="#">Home</a> / <a href="#">About</a> / <a href="#">Contact</a> / <a href="#">Browse</a></p>
        </div>
    </div>


</footer>


<script src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>
</body>

</html>