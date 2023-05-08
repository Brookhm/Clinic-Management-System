
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
</head>
<body>
<style>
    *{font-family: Georgia, serif;}
    </style>
    <section class="home" id="home">
    
    
     
     <div class="container">
            <h1>DBUCMS</h1>
            <h2>The website for the management of Clinic in DBU compound</h2>

           <a href="login.php"> <button class="homebtn">Welcome</button> </a> 
      </div>
    </section>  
 </div> 


 <style>
  * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }
  
  body {
    font-family: Georgia, serif;
  }
  
  .home {
    background-image: url("homeback.jpg");
    background-size: cover;
    background-position: center;
    height: 100vh;
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    color: white;
    
  }
  
  .home h1 {
    font-size: 4rem;
    margin-bottom: 1rem;
    text-shadow: 2px 2px #000;
  }
  
  .home h2 {
    font-size: 2rem;
    margin-bottom: 2rem;
    text-shadow: 1px 1px #000;
  }
  
  .homebtn {
    font-size: 1.5rem;
    padding: 1rem 2rem;
    border: none;
    border-radius: 5px;
    background-color: #43B3B1;
    color: white;
    cursor: pointer;
    transition: all 0.3s ease;
    text-shadow: 1px 1px #000;
  }
  
  .homebtn:hover {
    transform: translateY(-5px);
    box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.3);
  }
  
  .white {
    background-color: #FFF;
    padding: 2rem;
    display: flex;
    justify-content: space-around;
    align-items: center;
  }


.home {
    position: relative; 
}

.home::before {
    content: ""; 
    position: absolute; 
    top: 0; 
    left: 0; 
    width: 100%; 
    height: 100%; 
    background-color: rgba(0, 0, 0, 0.5); 
    z-index: -1; 
}

.homebtn:hover {
    transform: translateY(-5px);
    box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.7); 
}

  

</style>




</body>
</html>

<script>

const btn = document.querySelector(".homebtn"); 

btn.addEventListener("click", () => {
  alert("Welcome to DBUCMS!"); 
});


</script>