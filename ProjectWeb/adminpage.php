<!DOCTYPE html>
<html>
<head>
  <title>Admin Page</title>
  <link rel="stylesheet" type="text/css" href="adminpage.css">
</head>
<body>
  <div class="container">
    <h2>Admin Page</h2>
    <button id="accessButton" onclick="redirectToTables()">Access User Tables</button>
  </div>

  <script>
    function redirectToTables() {
      window.location.href = "Viewtables.php";
    }
  </script>
  </script>
        <footer>
            <div class="footer-content">
                <p>&copy; 2023 Keencure. All rights reserved.</p>
            </div>
        </footer>
        <style>
            footer {
            background-color: #ff7200;
            padding: 10px 0;
            text-align: center;
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
        }

        .footer-content {
            color: #131312;
        }
        

        .footer-content {
            color: #131312;
        }
        </style>
</body>
</html>
