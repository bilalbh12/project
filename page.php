<?php

include_once("cnx.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <title>my page web </title>
    
    <link rel="stylesheet" href="style.css">
</head>
<body>
 <?php

if(isset($_POST['send'])) {
    $email = $_POST['email'];
    $passwd = $_POST['passwd'];
    $result = mysqli_query($code, "SELECT * FROM usr WHERE email = '$email'");
    if(mysqli_num_rows($result) > 0) {
        $ligne = mysqli_fetch_assoc($result);
        if(password_verify($passwd, $ligne['passwd'])) {
            header('location: content.html');
            exit();
        }
    } else {
      echo "<script>alert('Your info is wrong');</script>"; 
    }   
}
    

?>
     <img src="nadiss.png" alt="nadiss">
  
    
   
   <form method='post'>
            <div class="txt">Tous les formulaires est obligatoire : <br></div>


            E-mail :
            <input type="email" name="email" placeholder="Votre E-amil" required>
            <br>

            Password :
            <input type="password" name="passwd" placeholder="Votre Password" required>
            <br>

            <button type="submit" name="send" class="bttn">submit</button><br>
        
        <div class="sign"> don't have an account ?<br><a href="sign.php">Sign Up</a><br></div>       
       
        </div>
        <div class="icon">
        <a href="https://www.facebook.com/nadisperformance/"><ion-icon name="logo-facebook"></ion-icon></a>
        <a href="https://business.google.com/reviews/l/13053540191135707003"><ion-icon name="logo-google"></ion-icon></a>
        <a href="https://fr.linkedin.com/company/nadis-performance"><ion-icon name="logo-linkedin"></ion-icon></a>
        </div>
        
    </form>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

<div class="wrapper">
    <img src="cookie.png" alt="">
    <div class="content">
      <header>have a cookie?</header>
      <p>This website use cookies to ensure you get the best experience on our website.</p>
      <div class="buttons">
        <button class="item">I understand</button>
        <a href="#" class="item">Learn more</a>
      </div>
    </div>
  </div>
  <script>
    const cookieBox = document.querySelector(".wrapper"),
    acceptBtn = cookieBox.querySelector("button");
    acceptBtn.onclick = ()=>{
      //setting cookie for 1 month, after one month it'll be expired automatically
      document.cookie = "CookieBy=true; max-age="+60*60*24*30;
      if(document.cookie){ //if cookie is set
        cookieBox.classList.add("hide"); //hide cookie box
      }else{ //if cookie not set then alert an error
        alert("Cookie can't be set! Please unblock this site from the cookie setting of your browser.");
      }
    }
    let checkCookie = document.cookie.indexOf("CookieBy=true"); //checking our cookie
    //if cookie is set then hide the cookie box else show it
    checkCookie != -1 ? cookieBox.classList.add("hide") : cookieBox.classList.remove("hide");
  </script>
</body>
</html>