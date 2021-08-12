<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

<?php include_once "header.php"; ?>

<body>
    <div class="wrapper">
        <section class="form signup">
        <header  style="text-align: center;">Realtime Chat App</header>
            <form action="#" enctype="multipart/form-data">
                <div class="error-txt"></div>
                <div class="name-details">

                    <div class="field input">
                        <label for="first name"> First Name </label>
                        <input type="text" placeholder="First name" name="fname" required>
                    </div>

                    <div class="field input">
                        <label for="Last name"> Last Name </label>
                        <input type="text" placeholder="Last name" name="lname" required>
                    </div>
                </div>

                <div class="field input">
                    <label for="Email Address"> Email Address </label>
                    <input type="email" placeholder="Enter your email" name="email" required>
                </div>

                <div class="field input">
                    <label for="Password"> Password </label>
                    <input type="password" placeholder="Enter new password" name="password" required>
                    <i class="fas fa-eye"></i>
                </div>

                <div class="field image">
                    <label for="img"> Select Image </label>
                    <input type="file"name="image" required >
                </div>

                <div class="field button">
                    <input type="submit" value="Continue to Chat">
                </div>
            </form>
            <div class="link">Already signed up? <a href="login.php"> Login </a></div>
        </section>
    </div>

    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/signup.js"></script>
</body>

</html>

</html>