<?php
  require "conn.php";

  if(isset($_FILES['files'])){
    $title = $_POST['title'];
    $descrip = $_POST['desc'];
    $filename = $_FILES['files']['name'];
    $temp_name = $_FILES['files']['tmp_name'];

    move_uploaded_file($temp_name, "files/".$filename);
    mysqli_query($conn, "insert into file_data(file_name, description, file_path) values('{$title}', '{$descrip}', '{$filename}')") or die("Can't able to upload the file");
    header("index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Document Maintenance System</title>
</head>
<body>
  <div class="container">
    <!-- Animated Background -->
    <div class="animated-background"></div>

    <!-- Navbar -->
    <nav class="navbar">
      <a href="#">🏠 Home</a>
      <a href="#contacts">📞 Contacts</a>
      <a href="#help">❓ Help</a>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
      <h1>
        Welcome to the <span class="highlight">Document Maintenance System</span>
      </h1>

      <form action="files_a.php" method="post">
      <!-- Search Section -->
      <div class="search-section">
        <h2>🔍 Find Your <span class="highlight">Documents</span></h2>
        <p>Answer the below question.</p>
        <input type="text" id="q2" name="desc"  placeholder="Enter Keyword of discription">
        <input type="submit" id="doc_btn" name="sub_btn" value="SEARCH DOCUMENT">
      </div>
      </form>

      <!-- Add Document Section -->
       <form action="" method="post" enctype="multipart/form-data">
      <div class="add-document-section">
        <h2>📂 Add a New <span class="highlight">Document</span></h2>
        <p>Fill in the details to upload a new document.</p>
        <input type="text" id="title" name="title" placeholder="Document Title" required>
        <input type="text" id="description" name="desc" placeholder="Description" required>
        <input type="file" id="filepath" name="files" placeholder="File Path" required>
        <input type="submit" id="doc_btn" name="sub_btn" value="ADD DOCUMENT">
        
      </div>
    </form>
    </div>
  </div>

  <script src="script.js"></script>
</body>
</html>
