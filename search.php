<?php
    include "db_con1.php";
    session_start();
    if(isset($_POST['search']))
    {
        $book_name = $_POST['book_name'];

        $stmt = $con->prepare("SELECT * FROM books WHERE book_name = ?");
        $stmt->bind_param("s", $book_name);

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            header("Location: view.php?book_no=" . urlencode($row['book_no']) . "&book_name=" . urlencode($row['book_name']) . "&book_stock=" . urlencode($row['book_stock']));
            exit();
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("No record found")';
            echo '</script>';
        }

        $stmt->close();
        $con->close();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        header{
                color: blue;
                background-color: rgb(11, 226, 162);
                font-size: 40px;
                text-align: center;
                font-family:'Times New Roman', Times, serif;
                border-radius: 10px;
                top: 0px;
                position: fixed;
                width: 100%;
                left: 0px;
                z-index: 1;
            }
        body{
            background-size: cover;
            background-image: url("https://www.geethanjaliinstitutions.com/engineering/ece/img/carousel/2.png");
            background-position: center;
            height: 100vh;
            margin: 0;
            padding: 0;
            backdrop-filter: blur(10px);
            display: flex;
            align-items: center;
            justify-content: center;
            }
            .form{
                width:40rem;
                margin: auto;
                color:white;
                margin-top: 150px;
                background-color:#001199;
                border-radius: 12px;
                align-items:center;
                height:450px;
            }
            .img{
                width: 50px;
                height: 50px;
                align-self: baseline;
            }
            .user{
            width: 100px;
            height: 30px;
            font-size: larger;
            background-color: rgb(154, 235, 154);
        }
        .data{
            font-size: larger;
            font-family: 'Times New Roman', Times, serif;
        }
        .name{
            width: 200px;
            height: 30px;
            font-size: large;
        }
    </style>
</head>
<body>
<header><marquee>Welcome ,<?php echo $_SESSION['username']; ?></marquee></header>
<form action="search.php" class="form" method="post" name="f1">
        <h1 align="center">Search Book</h1>
  <br>  
    <center>
    <div class="mainContainer">
        <p class="data">Book Name:<input type="text" placeholder="Enter Book Name" autocomplete="off" name="book_name" class="name"></p>
        <br>
        <input  type="submit" value="Search" class="user" name="search">&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="button" value="Home" class="user" onclick="window.open('library.php', '_self')">&nbsp;&nbsp;&nbsp;&nbsp;
        <input  type="reset" value="Clear" class="user">
        <br> 
    </div>
    </center>
</form>
</body>
</html>