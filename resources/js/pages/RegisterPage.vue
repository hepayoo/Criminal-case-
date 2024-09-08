<template>
     <div class="register-bg">
        <div class="papers-r">
        <img :src="'/pics/Rectangle 7.svg'" alt="" class="image1-r">
        <img :src="'/pics/Rectangle 4.svg'" alt="" class="image2-r">
        <img :src="'/pics/Rectangle 6.svg'" alt="" class="image3-r">
        <img :src="'/pics/Group 24.png'" alt="" class="man-r">
        <img :src="'/pics/Plume (1).svg'" alt="" class="plume-r">
        
        </div>
        
        
        
        <div class="login-container-r">
        
                   
                
            <div class="login-box-r">
               
                <form @submit.prevent="submit">
                   
                    <div class="input-group-r">
                        <label for="email">Full name</label>
                        <input type="text" id="name" v-model="fields.name"/>
                        <span v-if="errors.name" class="error">{{ errors.name[0] }}</span>
                    </div>
                    <div class="input-group-r">
                        <label for="email">Email</label>
                        <input type="email" id="email" v-model="fields.email"/>
                        <span v-if="errors.email" class="error">{{ errors.email[0] }}</span>
                    </div>
                    <div class="input-group-r">
                        <label for="password">Password</label>
                        <input type="password" id="password" v-model="fields.password"/>
                        <span v-if="errors.password" class="error">{{ errors.password[0] }}</span>
                    </div>
                    <div class="input-group-r">
                        <label for="password_confirmation">Confirm password</label>
                        <input type="password" id="password_confirmation" v-model="fields.password_confirmation"/>
                    </div>
        
                    <div class="input-group-r">
            <label for="role">Register as:</label>
            <select id="role" v-model="fields.role" required>
              <option value="" disabled>Select Role</option>
              <option value="user">User</option>
              <option value="family">Family</option>
            </select>
          </div>
                    <button type="submit" class="sign-up-button-r">
                        
                        <img :src="'/pics/Sealing wax.png'" class="Wax-r">
                        Sign up
                    </button>
                    
                </form>
                <p >
          <router-link to="/login" class="signup-link-r">Already a Member? </router-link>
        </p>
            </div>
        </div></div>


  </template>
  
  <script>
  export default {
    data() {
      return {
        fields: {
          name: '',
          email: '',
          password: '',
          password_confirmation: '',
          role: '' 
        },
        errors: {},
      };
    },
    methods: {
      submit() {
        console.log(this.fields); 
  
        axios.post("/api/register", this.fields)
          .then(() => {
            this.$router.push({ name: "Dashboard" });
          })
          .catch((error) => {
          this.errors = error.response.data.errors;
        });
      }
    }
  };
  </script>
  
  
  <style>
.register-bg{
    margin: 0;
    padding: 0;
    font-family: 'Dancing Script', cursive;
    background: url('pics/Desktop - 15 (3) (1).png') no-repeat center center fixed;
    background-size:cover;
  
   
}
.error {
  color: red;
  display: block;
  margin-top: 1px;
  margin-bottom: 1px;
}
html, body {
    height: 100%;
    margin: 0;
}

.papers-r {
    position: relative;
    top: 0;
    left: 0;
}
.image1-r {
    position: absolute;
    margin-left: 27%;
    width: 47%;
    margin-top: 8px;
    
  }
  .image2-r {
    position: absolute;
    margin-left: 27%;
    width: 47%;
    margin-top: 17px;
   
  }
  .image3-r {
    position: absolute;
    margin-left: 27%;
    width: 48%;
    margin-top: 10px;
   
  }
  .man-r {
    position: absolute;
    margin-left: 44%;
    width: 14%;
    margin-top: 16px;
   
  }
  .plume-r {
    position: absolute;
    margin-left: 58%;
    width: 27%;
    margin-top: 50px;
   
  }



.login-container-r {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.login-box-r {
   
    padding: 15px;
    border-radius: 10px;
    margin-top: 55px;
    width: 300px; 
}


.input-group-r {
    margin-bottom: 1px;
    position: relative;
}

.input-group-r label {
    display: block;
    font-size: 19px;
    margin-bottom: 0px;
    color: #7A5A3E;
}

.input-group-r input {
    width: 100%;
    padding: 4px;
   
    border: 4px solid #7A5A3E;
    font-size: 20px;
    background-color: #D5CAA4;
    font-family: inherit;
    color: #5c3a1e;
}

.sign-up-button-r {
    padding: 3px;
    width: 50%;
    margin-left: 88px;
    position: relative;
    
    border: 4px solid #D5CAA4;
    background-color: #7A5A3E;
    color: #D3C8A1;
    font-size: 35px;
    font-family: inherit;
    cursor: hand;
    transition: background-color 0.3s ease;
    margin-top: 15px;
   
}

.sign-up-button-r:hover {
    background-color: #3a2b1e;
}

.signup-link-r {
    position: relative;
    margin-top: -10px;
    font-size: 19px;
    color: #5c3a1e;
    cursor: pointer;
    margin-left: 95px;

}

.signup-link-r:hover {
    text-decoration:underline;
}

.Wax-r{

    width: 70px; 
    position: absolute; 
    top: 0;
    left: 0; 
    transform: translate(-40%, -50%);
    
}

.input-group-r select {
    width: 105%;
    padding: 4px;
    border: 4px solid #7A5A3E; 
    background-color: #D5CAA4; 
    color: #5c3a1e; 
    font-size: 21px;
    font-family: 'Dancing Script', cursive;
   
    box-shadow: 0 4px 6px rgba(0,0,0,0.1); 
    cursor: pointer; 
}



</style>
  