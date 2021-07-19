<html>
<?php
// if (isset($this->session->userdata['logged_in'])) {
//    echo $username = ($this->session->userdata['username']);
$username =$this->session->userdata('username');
$email=$this->session->userdata('email');
$id =$this->session->userdata('id');
//    echo $email = ($this->session->userdata['email']);
//    echo $id = ($this->session->userdata['id']);
// } else {
// header("location: login");
// }
?>
<head>
<title>Customer Page</title>
</head>
<body>
<?php
echo "Hello <b id='welcome'><i>" . $username . "</i> !</b>";
echo "<br/>";
echo "<br/>";


echo "Welcome to Customer Page";
echo "<br/>";
echo "<br/>";
echo "Your Username is " . $username;
echo "<br/>";
echo "Your Email is " . $email;
echo "<br/>";
echo "Your ID is " . $id;
echo "<br/>";
?>
<b id="logout"><a href="logout">Logout</a></b>
</div>
<br/>
</body>
</html>