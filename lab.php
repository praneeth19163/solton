<html>
    <head>
        <title>Lab Management</title>
        <style>
            *{
                margin: 0%;
                padding: 0%;
            }
            
            header{
                text-align: center;
                color: cadetblue;
                font-size: 40px;
                top: 0px;
                width: 100%;
                height: 10%;
                background-image: url("problem.jpg");
                background-size: 10% 10%;
                background-attachment: fixed ;
                background-repeat: no-repeat;
                background-color: antiquewhite;
        
            }
            .container{
                
                margin-top: 15%;
                display: flex;
                flex-direction: row;
                justify-content: space-around;
                background-color: aliceblue;
            }
            .item1{
              width: 200px;
              height: 200px;
              border: 2px solid black;
              background-image:linear-gradient(120deg,red,orange);
              border-radius: 30px;
            
            }
            .item2{
              width: 200px;
              height: 200px;
              border: 2px solid black;
              background-image:linear-gradient(120deg,lightgreen,orange);
              border-radius: 30px
            }
            footer{
                text-align: center;
                color: cadetblue;
               background-color: aqua;
                bottom: 0px;
                position: fixed;
                width: 100%;
                
            }
            h1{
                color: green;
            }
        </style>
    </head>
    <body>
        <header><ins>LAB MANAGEMENT</ins></header>
        <div class="container">
        <div ><a href="labregister.php" ><input type="button" value="Register Your Problem" name="prost" class="item1"></a>
    
        </div>
        <div><a href="labenquiry.php" ><input type="button" value="Enquire Your Problem" name="prost" class="item2"></a>
            
        </div>
        </div>
        <footer>
            <h1>Geethanjali College of Engineering and Technology.</h1>
            <h2>Contact:B.Shiva Sharan (Lab Manager)</h2>
            <h3>Mobile-NO:9182346190</h3>
        </footer>
    </body>
</html>