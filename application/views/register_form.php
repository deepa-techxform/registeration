<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Rgisteration Form</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css'>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/register_style.css'); ?>">

</head>
<body>
<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simple Reistration Form</title>
</head>
<body>
    <form action="<?php echo base_url('Registeration/create_form'); ?>" method="POST">
        <div class="container">
          <h1>Sign Up</h1>
          <p>Please fill in this form to create an account.</p>
      
              <label for="email"><b>Username</b></label>
            <input type="text" name="username" placeholder="Enter Username" required>
          <label for="email"><b>Email</b></label>
          <input type="text" placeholder="Enter Email" name="email" required>
          
          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="psw" required>
      
                  <label for="email"><b>Phone Number</b></label>
            <br>
           <select name="phoneCode" required>
            <option selected hidden value="">Code</option>
            <option value="66">+98</option>
            <option value="66">+99</option>
            <option value="66">+90</option>
            <option value="66">+66</option>
           </select>
           <input type="phone" name="phone" placeholder="812345678" required>
      
          <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
      
          <div class="clearfix">
      
            <button type="submit" class="btn">Sign Up</button>
          </div>
        </div>
      </form>

  <div class="youtubeBtn">
  <a target="_blank" href="https://www.youtube.com/watch?v=7k8kKRQa9jY">
      <span>Watch on YouTube</span>
  <i class="fab fa-youtube"></i>
    </a>

</div>
</body>
</html>
<!-- partial -->
  
</body>
</html>
