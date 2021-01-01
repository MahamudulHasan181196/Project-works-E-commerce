<!DOCTYPE html>
<html>

<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="CheckOrderDeliver.css">
  <link rel="stylesheet" type="text/css" href="../css/mystyle.css" >
	<link rel="stylesheet" type="text/css" href="../css/footer.css" >
	<link rel="stylesheet" type="text/css" href="../css/colorchng.css" >
	<div class="sticky">
<div class="header"><h3>Order Details</h3></div>
<div class="topnav">
<a href="DeliveryHome.php"> < </a>

</div>
</div>
  <style>
    body {
      background-color: antiquewhite;
      /* background-repeat: no-repeat; */
    }
  </style>
</head>

<body>
  <div>
    <center>

      <h1></h1>
      <input type="text" id="search_data" name="search_data"><button class="button" type="button">Search</button>
      <br><br>
      <table id="result" class="result">

      </table>
      <!-- <div id="result" class="result"></div> -->
    </center>
  </div>
  <a href="DeliveryHome.php"><button class="backbtn">Back</button></a>
  <a href="Logout.php"><button class="backbtn">Logout</button></a>

	<br><br>

<br>

<br><br>
      <div class="footer">
  <p>© 2020 Manik|Nowrin|Syed|Mahamudul All Rights Reserved</p>
  <p><a href="AboutUs.php">About Us</a></p>
</div>

</body>

</html>
<script>
  $(document).ready(function() {

    load_data();

    function load_data(query) {
      $.ajax({
        url: "fetch.php",
        method: "POST",
        data: {
          query: query
        },
        success: function(data) {
          $('#result').html(data);
        }
      });
    }
    $('#search_data').keyup(function() {
      var search = $(this).val();
      if (search != '') {
        load_data(search);
      } else {
        load_data();
      }
    });
  });
</script>