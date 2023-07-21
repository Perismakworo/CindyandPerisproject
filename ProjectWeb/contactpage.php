<!DOCTYPE html>
<html>
<head>
  <title>KeenCure Pharmaceuticals - Contact</title>
  <link rel="stylesheet" href="contactpage.css">
</head>
<body>
<div class="navbar" style="display: flex;">
            <div class="icon">
                <h2 class="logo">Keencure</h2>
            </div>
            <div class="menu">
                <ul>
                    <li><a class="active" href="homepage.html">Home</a></li>
                    <li><a href="aboutpage.php">About</a></li>
                    <li><a href="servicepagehtml.php">Services</a></li>
                    <li><a href="contactpage.php">Contact</a></li>
                    <li><a href="login2.php">Login</a></li>
                </ul>
            </div>
        </div>
        <br>
        <style>
          .navbar {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    background-color: #333;
    color: #FFF;
    padding: 10px;
    z-index: 999; /* Set a high z-index value to ensure the menu stays on top of other elements */
  }
  


.icon {
    width: 200px;
    height: 70px;
}

.logo {
    color: #00bbff;
    font-size: 25px;
    font-weight: bold;
    padding-top: 10px;
}

.menu ul {
    display: flex;
    list-style: none;
}

.menu ul li {
    margin-left: 20px;
}

.menu ul li a {
    text-decoration: none;
    color: #fff;
    font-size: 16px;
    font-weight: bold;
    padding: 6px 10px;
    transition: 0.4s ease-in-out;
    border-radius: 2px;
}

.menu ul li a.active,
.menu ul li a:hover {
    background: #ff7200;
    color: #000;
}
</style>
  <div class="container">
    <h1>Contact</h1>
    
    <div class="contact-info">
      <h2>Contact Information</h2>
      <p><strong>KeenCure Pharmaceuticals</strong></p>
      <p>123 Pharma Street, Cityville, Country</p>
      <p>Phone: +1 (123) 456-7890</p>
      <p>Email: info@keencurepharma.com</p>
      <p>Fax: +1 (123) 456-7891</p>
    </div>
    
    <div class="contact-form">
      <h2>Contact Form</h2>
      <form action="contact.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone">
        
        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="5" required></textarea>
        
        <button type="submit">Send Message</button>
      </form>
    </div>
  </div>
</body>
</html>
