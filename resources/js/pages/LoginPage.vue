<template>
    <div class="login-bg">   <div class="papers">
<img :src="'/pics/Rectangle 7.svg'" alt="" class="image1">
<img :src="'/pics/Rectangle 4.svg'" alt="" class="image2">
<img :src="'/pics/Rectangle 6.svg'" alt="" class="image3">
<img :src="'/pics/Group 24.png'" alt="" class="man">
<img :src="'/pics/Plume (1).svg'" alt="" class="plume">

</div>



<div class="login-container">

           
        
    <div class="login-box">
       
        <form>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" >
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" >
            </div>
            <button type="submit" class="sign-in-button">
                
                <img :src="'/pics/Sealing wax.png'" class="Wax">
                Sign in
            </button>
            
        </form>
        <p class="signup-link">Not a Member? </p>
    </div>
</div>
</div>
  </template>

  
  <script>
  export default {};
  </script>

  <style>

.login-bg{
    margin: 0;
    padding: 0;
    font-family: 'Dancing Script', cursive;
    background: url('pics/Desktop - 15 (3) (1).png') no-repeat center center fixed;
    background-size:cover;
  
   
}
html, body {
    height: 100%;
    margin: 0;
}

.papers {
    position: relative;
    top: 0;
    left: 0;
}
.image1 {
    position: absolute;
    margin-left: 27%;
    width: 47%;
    margin-top: 8px;
    
  }
  .image2 {
    position: absolute;
    margin-left: 27%;
    width: 47%;
    margin-top: 17px;
   
  }
  .image3 {
    position: absolute;
    margin-left: 27%;
    width: 46%;
    margin-top: 10px;
   
  }
  .man {
    position: absolute;
    margin-left: 43%;
    width: 15%;
    margin-top: 80px;
   
  }
  .plume {
    position: absolute;
    margin-left: 58%;
    width: 27%;
    margin-top: 50px;
   
  }



.login-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.login-box {
   
    padding: 20px;
    border-radius: 10px;
    margin-top: 80px;
    width: 300px; 
}


.input-group {
    margin-bottom: 13px;
    position: relative;
}

.input-group label {
    display: block;
    font-size: 24px;
    margin-bottom: 5px;
    color: #7A5A3E;
}

.input-group input {
    width: 96%;
    padding: 7px;
   
    border: 4px solid #7A5A3E;
    font-size: 21px;
    background-color: #D5CAA4;
    font-family: inherit;
    color: #5c3a1e;
}

.sign-in-button {
    padding: 10px;
    width: 70%;
    margin-left: 60px;
    position: relative;
    
    border: 4px solid #D5CAA4;
    background-color: #7A5A3E;
    color: #D3C8A1;
    font-size: 35px;
    font-family: inherit;
    cursor: hand;
    transition: background-color 0.3s ease;
    margin-top: 17px;
   
}

.sign-in-button:hover {
    background-color: #3a2b1e;
}

.signup-link {
    position: relative;
    margin-top: 2px;
    font-size: 19px;
    color: #5c3a1e;
    cursor: pointer;
    margin-left: 115px;
}

.signup-link:hover {
    text-decoration:underline;
}

.Wax{

    width: 100px; 
    position: absolute; 
    top: 0;
    left: 0; 
    transform: translate(-40%, -50%);
    
}











</style>