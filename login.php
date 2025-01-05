<?php
//memulai session atau melanjutkan session yang sudah ada
session_start();

//menyertakan code dari file koneksi
include "koneksi.php";

//check jika sudah ada user yang login arahkan ke halaman admin
if (isset($_SESSION['username'])) { 
	header("location:admin.php"); 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['user'];
  
  //menggunakan fungsi enkripsi md5 supaya sama dengan password  yang tersimpan di database
  $password = md5($_POST['pass']);

	//prepared statement
  $stmt = $conn->prepare("SELECT username 
                          FROM user 
                          WHERE username=? AND password=?");

	//parameter binding 
  $stmt->bind_param("ss", $username, $password);//username string dan password string
  
  //database executes the statement
  $stmt->execute();
  
  //menampung hasil eksekusi
  $hasil = $stmt->get_result();
  
  //mengambil baris dari hasil sebagai array asosiatif
  $row = $hasil->fetch_array(MYSQLI_ASSOC);

  //check apakah ada baris hasil data user yang cocok
  if (!empty($row)) {
    //jika ada, simpan variable username pada session
    $_SESSION['username'] = $row['username'];

    //mengalihkan ke halaman admin
    header("location:admin.php");
  } else {
	  //jika tidak ada (gagal), alihkan kembali ke halaman login
    header("location:login.php");
  }

	//menutup koneksi database
  $stmt->close();
  $conn->close();
} else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body id="dynamic-bg" class="bg-primary d-flex justify-content-center align-items-center vh-100">



        <!-- Card Login -->
    <div class="card shadow-lg p-4" style="width: 100%; max-width: 600px; background: rgba(255, 255, 255, 0.9);">
    <div class="text-center mb-4">
            <i class="bi bi-person-circle text-primary" style="font-size: 3rem;"></i>
            <h3 class="text-primary position-relative d-inline-block">Login
            <span class="position-absolute start-50 translate-middle-x" style="width: 50px; height: 2px; background-color: #007bff; bottom: -10px;"></span>
            </h3>
           
        </div>
       
        <form method="POST" action=""> 

        <!-- Username -->
            <div class="mb-3">
            <label for="email" class="form-label">Username</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                    <input type="text" class="form-control" id="user" name="user" placeholder="Enter your Username" required>
                </div>
            </div>

        <!-- Password -->
            <div class="mb-3">
            <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-key"></i></span>
                    <input type="password" class="form-control" id="pass" name="pass" placeholder="Enter your password" required>
                    <span class="input-group-text">
                        <i class="bi bi-eye-slash" id="togglePassword"></i>
                    </span>
                </div>
            </div>

            <!-- Remember Me -->
            <div class="mb-3">
            <div class="form-check">
      <input class="form-check-input" type="checkbox" id="autoSizingCheck2">
      <label class="form-check-label" for="autoSizingCheck2">
        Remember me
      </label>
    </div>
            </div>
            <!-- Button Login -->
            <button type="submit" class="btn btn-primary w-100" style="background: linear-gradient(45deg, #007bff, #00c6ff); color: #fff;">Login</button>
        </form>
    </div>
   
    <script>
        // JavaScript untuk toggle password visibility
        const togglePassword = document.querySelector('#togglePassword');
        const passwordInput = document.querySelector('#password');

        togglePassword.addEventListener('click', function () {
            // Toggle tipe input antara 'password' dan 'text'
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            // Toggle ikon mata
            this.classList.toggle('bi-eye');
            
            this.classList.toggle('bi-eye-slash');
         
        });
        
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<?php
}
?>
