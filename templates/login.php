<?php include 'includes/header.php'; ?>

 <h3>Login form</h3>
                <form role="form" method="POST" action="login.php">
                  <div class="form-group">
                    <label for="exampleinputemail">Username</lable>
                    <input type="text" class="form-control" name="username" placeholder="Enter username" />
                  </div>
                  <div class="form-group">
                    <label for="exampleinputpassword">Password</lable>
                    <input type="password" class="form-control" name="password" placeholder="Enter password" />
                  </div>
                  <button name="dologin" type="submit" class="btn btn-primary">Login</button><a href="register.html" class="btn btn-default">Create an account</a>
                </form>
