
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0%;
            padding: 0%;
        }
        .head{
            text-align: center;
            font-size: 25px;
            background-color:aliceblue;
            padding: 5px;
            
        }
        .wrapper{
            margin: 10%;
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            align-content: center;
            flex-wrap: wrap;
        }
        #block,#labno,#problemtype,#problem{
            text-align: center;
            color: white;
            background-color: black;
            font-size: large;
        }
        .s{
            margin-left: 46vw;
            text-align: center;
            background-color:aliceblue;
            color: black;
            font-size: larger;
        }
        
        footer{
                text-align: center;
                color: cadetblue;
               background-color:darkgrey;
                bottom: 0px;
                position: fixed;
                width: 100%;
                
            }
    </style>
</head>
<body>
    <div class="head">
    <h1><ins>LAB MANAGEMENT</ins></h1>
    <marquee behavior="" direction="left">Find solution to your problem by registering your problem here...</marquee>
    </div>
    <?php
    session_start();
            $conn=mysqli_connect('localhost','root','','dt');
            if(mysqli_connect_error()){
                exit("Error connecting to Database");
            }
            if(isset($_POST["submit"])){
               $name=$_SESSION['username'];
               $id=$_SESSION['id'];
               $block=$_POST["block"];
               $labno=$_POST["labno"];
               $problemtype=$_POST["problemtype"];
               $problem=$_POST["problem"];
               date_default_timezone_set('Asia/Kolkata');
               $date=date('d-m-y h:i:s');

        
            echo $name,$id;
            if($block==1){
                $block="Block 1";
            }
            else if($block==2){
                $block="Block 2";
            }
            else if($block==3){
                $block="Block 3";
            }
            else if($block==4){
                $block="Block 4";
            }
            else if($block==5){
                $block="Block 5";
            }
            
            if($labno==1){
                $labno="lab 1, 223";
            }
            else if($labno==2){
                $labno="lab 2, 307";
            }
            else if($labno==3){
                $labno="lab 3, 108";
            }
            else if($labno==4){
                $labno="lab 4, G09";
            }
            else if($labno==4){
                $labno="lab 5, 107";
            }
            if($problemtype==1){
                $problemtype="Lab Equipment";
            }
           else if($problemtype==2){
                $problemtype="Computers";
            }
            
            if($stmt=$conn->prepare('INSERT INTO lab (name,id,blockno,labno,problemtype,problem,time) VALUES ( ?, ?, ?, ?, ?, ?,? )')){
                    
                $stmt->bind_param("sssssss",$name,$id,$block,$labno,$problemtype,$problem,$date);
                $stmt->execute();
                
     echo '<script type="text/javascript">';
     echo 'alert("Your problem is successfully registered")';
     echo '</script>';
            }
        else{
                die("Something went wrong");
            }
            
        }
            ?>
    <form action="labregister.php" method="post" id="form">
    <div class="wrapper">
        <select name="block" id="block">
            <option value="-1">Select Blockno</option>
            <option value="1">Block 1</option>
            <option value="2">Block 2</option>
            <option value="3">Block 3</option>
            <option value="4">Block 4</option>
            <option value="5">Block 5</option>
        </select>
        <select name="labno" id="labno">
            <option value="-1">Select Lab no</option>
            <option value="1">lab 1, 223</option>
            <option value="2">lab 2, 307</option>
            <option value="3">lab 3, 108</option>
            <option value="4">lab 4, G09</option>
            <option value="5">lab 5, 107</option>
        </select>
        <select name="problemtype" id="problemtype">
            <option value="-1">Select Problem Type</option>
            <option value="1">Lab Equipment</option>
            <option value="2">Computers</option>
        </select>
        <select name="problem" id="problem">
            <option value="-1">Select Problem</option>
        </select>
    </div>
      <input type="submit" value="Register" name="submit" class="s">
    </form>
      <footer>
            <h1>Geethanjali College of Engineering and Technology.</h1>
            <h2>Contact:B.Shiva Sharan (Lab Manager)</h2>
            <h3>Mobile-NO:9182346190</h3>
        </footer>
    <script>
        let prost=[
            {
                protype:"Lab Equipment",
                code:1,
                problems:["Wifi Connection","Projector","Chairs","Fans","Windows"]
            },
            {
                protype:"Computers",
                code:2,
                problems:["CPU","Mouse","Keyboard","Computer Desk","Malfunction"]
            }
        ]
        let type=document.querySelector("#problemtype");
        let pro=document.querySelector("#problem");

        type.onchange=function()
        {
            pro.options.length=0;
            if(type.value != -1)
            {
                for(ele of prost)
                {
                    if(type.value==ele.code)
                    {
                        let problems=ele.problems;
                        let op=document.createElement('option');
                        op.value=-1;
                        op.innerText="Select ProblemType";
                        problem.options[0]=op;
                        let i=1;
                        for(p of problems)
                        {
                            let op=document.createElement('option');
                            op.value=p;
                            op.innerText=p;
                            problem.options[i]=op;
                            i++;
                        }
                    }
                }
            }
        }
    </script>
</body>
</html>