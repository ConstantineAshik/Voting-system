<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Admin | Voting System</title>
  <?php include('./header.php'); ?>
  <?php 
  session_start();
  if(isset($_SESSION['login_id']))
  header("location:index.php?page=home");
  ?>
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <style>
    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      background: url('your-photo.jpg') no-repeat center center fixed;
      background-size: cover;
    }
    header {
      background: rgba(0, 123, 255, 0.8);
      color: white;
      padding: 1rem;
      text-align: center;
    }
    header .logo {
      font-size: 3rem;
    }
    main#main {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }
    #login-right .card {
      width: 100%;
      max-width: 400px;
      padding: 2rem;
      border: none;
      background: rgba(255, 255, 255, 0.85);
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
    .btn-custom {
      background-color: #28a745;
      color: white;
    }
    .btn-custom:hover {
      background-color: #218838;
      color: white;
    }
    footer {
      padding: 20px;
      background: rgba(0, 123, 255, 0.8);
      text-align: center;
      border-radius: 10px 10px 0 0px;
    }
    .footer .nav {
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
    }
    .footer .nav h6 {
      font-weight: bold;
      color: white; /* Changed text color to white */
    }
    .footer .nav a {
      display: block;
      margin: 5px 0;
      color: white; /* Changed text color to white */
      text-decoration: none;
    }
    .footer .social-icons {
      display: flex;
      justify-content: center;
      gap: 15px;
    }
	.avatar {
	  width: 50px;
	  height: 50px;
	  border-radius: 50%;
	  object-fit: cover;
	  margin-bottom: 10px;
	}
  </style>
</head>

<body>
  <header>
    <div class="logo">
      <i class="fas fa-poll-h"></i>
    </div>
    <h1>Voting System</h1>
  </header>
  <main id="main">
    <div id="login-right">
      <div class="card">
        <div class="card-body">
          <h4 class="text-center mb-4">Admin/User Login</h4>
          <form id="login-form">
            <div class="form-group">
              <label for="username" class="control-label">Username</label>
              <input type="text" id="username" name="username" class="form-control" placeholder="Admin/User">
            </div>
            <div class="form-group">
              <label for="password" class="control-label">Password</label>
              <input type="password" id="password" name="password" class="form-control" placeholder="Password">
            </div>
            <center>
              <button class="btn btn-custom btn-block">Login</button>
            </center>
          </form>
        </div>
      </div>
    </div>
  </main>

  <footer class="footer">
    <div class="nav">
      <div>
	  <img src="img/ashik.jpg" alt="Avatar" class="avatar"> <!-- Added avatar -->
	  <h6 class="footer-title">Md Ashik</h6> 
        <a class="link link-hover">2020-3-60-032</a>
      </div> 
      <div>
	  <img src="img/tajim.jpg" alt="Avatar" class="avatar"> <!-- Added avatar -->
	  <h6 class="footer-title">Mehedi Hasan Tajim</h6> 
        <a class="link link-hover">2021-3-60-080</a>
      </div> 
      <div>
        <h6 class="footer-title
		">Social</h6> 
        <div class="social-icons">
          <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path></svg></a>
          <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"></path></svg></a>
          <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"></path></svg></a>
        </div>
      </div>
    </div>
  </footer>

  <!-- jQuery and Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    $('#login-form').submit(function(e) {
      e.preventDefault();
      const button = $(this).find('button');
      button.attr('disabled', true).html('Logging in...');

      if ($(this).find('.alert-danger').length > 0) {
        $(this).find('.alert-danger').remove();
      }

      $.ajax({
        url: 'ajax.php?action=login',
        method: 'POST',
        data: $(this).serialize(),
        error: function(err) {
          console.log(err);
          button.removeAttr('disabled').html('Login');
        },
        success: function(resp) {
          if (resp == 1) {
            location.href = 'index.php?page=home';
          } else if (resp == 2) {
            location.href = 'voting.php';
          } else {
            $('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>');
            button.removeAttr('disabled').html('Login');
          }
        }
      });
    });
  </script>
</body>
</html>
