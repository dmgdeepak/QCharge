
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"href="css/user_side.css">

        <link rel="stylesheet"href="css/animate.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Libre+Baskerville|Lobster" rel="stylesheet">

    </head>
    <body>
      <style>
      #section-2 {
          width: 810px;
          height: 200px;
          margin-top: 90px;
          margin-left: 305px;
          left:25%;
	font-family: 'Libre Baskerville', serif;
          font-size: 25px;
         animation-delay: 0.1s;
         animation-duration: 1s;
         animation-iteration-count: 1;
          color: #fff;
          }

          #button{
              color: #fff;
              font-family: sans-serif;
              width: 200px;
              padding: 10px;
              border:2px solid #000;
              text-align: center;
              position: absolute;
              top: 50%;
              left: 50%;
              transform: translate(-50%,-50%);
              overflow: hidden;
              transition: .5s;
              margin-top: 120px;
			  margin-left: -40px;
              border-radius: 15px;
             text-decoration: none;
			  font-family: 'Lobster', cursive;
          }
          #button:after{
              content: "";
              width: 0px;
              height: 120%;
              position: absolute;
              left: -10%;
              bottom: 0;
              background-color: #4CAF50;
              transform: skewX(15deg);
              z-index: -1;
              transition: .5s;
              }
          #button:hover{
              cursor: pointer;
              color: #fff;
              background-color: #000;
          }
          #button:hover:after{
              left: -10%;
              width: 120%;
          }

                       #button1{
                        color: #fff;
                        font-family: sans-serif;
                        width: 200px;
                        padding: 10px;
                        border:2px solid #000;
                        text-align: center;
                        position: absolute;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%,-50%);
                        overflow: hidden;
                        transition: .5s;
                        margin-top: 120px;
                        margin-left: 270px;
                        border-radius: 15px;
                       text-decoration: none;
						   font-family: 'Lobster', cursive;
                    }
                    #button1:after{
                        content: "";
                        width: 0px;
                        height: 120%;
                        position: absolute;
                        left: -10%;
                        bottom: 0;
                        background-color: #4CAF50;
                        transform: skewX(15deg);
                        z-index: -1;
                        transition: .5s;
                        }
                    #button1:hover{
                        cursor: pointer;
                        color: #fff;
                        background-color: #000;
                    }
                    #button1:hover:after{
                        left: -10%;
                        width: 120%;
                    }
</style>

<section id="section-2">

<strong>This project is applicable to utilize knowledge of all the users and play quiz that too with a amazing features of winning free mobile recharge
<br>

    Each correct attempted question will give Rs0.05 and incorrect attempted will give Rs 0.03.<br>
Each refer will give Rs 2 when User with your refered person sign up.</strong>
      <div id="button" onclick="window.location.assign('loginform.php');"><a href="loginform.php" style="text-decoration: none">Take Me In</a></div><br>
      <div id="button1" onclick="window.location.assign('/t/article');"><a href="/t/article" style="text-decoration: none; ">Article</a></div>

    </section>

    </body>
    </html>
