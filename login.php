<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>
<?php include_once "header.php"; ?>

<body>
    <div class="wrapper">
        <section class="form login">
            <header style="text-align: center;">Realtime Chat App</header>

            <form action="#" method="POST" enctype="multipart/form-data" autocomplete="on">
                <div class="error-txt"></div>
                <div class="field input">
                    <label for="Email Address"> Email Address </label>
                    <input type="email" placeholder="Enter your email" name="email" required>
                </div>

                <div class="field input">
                    <label for="Password"> Password </label>
                    <input type="password" placeholder="Enter your password" name="password" required>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field button">
                    <input type="submit" name="submit" value="Continue to Chat">
                </div>
            </form>
            <div class="link">Not yet signed up? <a href="index.php">Signup now</a></div>
        </section>
    </div>
    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/login.js"></script>
</body>

</html>

</html>