<template>
      <div class="papers">
        <img :src="'/pics/vintage.png'" alt="" class="vintage">
        <img :src="'/pics/war-card.png'" alt="" class="card">
        <img :src="'/pics/Case File.svg'" alt="" class="case">
        <img :src="'/pics/stick.png'" alt="" class="stick">
    </div>
    <div class="bg">
        <img :src="'/pics/les empreintes.png'" alt="" class="empreintes">
    </div>

    <div class="text-container">
        <div class="text">
            
            <h1 class="line-1 typing-effect"></h1> <!-- Container for the first part of the text -->
            <h1 class="line-2 typing-effect-2"></h1> <!-- Container for the second part with wax seal -->
          
        </div>

        
<label class="container">
  <input checked="checked" type="checkbox" id="startButton">
    <svg viewBox="0 0 384 512" height="1em" xmlns="http://www.w3.org/2000/svg" class="play"><path d="M73 39c-14.8-9.1-33.4-9.4-48.5-.9S0 62.6 0 80V432c0 17.4 9.4 33.4 24.5 41.9s33.7 8.1 48.5-.9L361 297c14.3-8.7 23-24.2 23-41s-8.7-32.2-23-41L73 39z"></path></svg>
    <svg viewBox="0 0 320 512" height="1em" xmlns="http://www.w3.org/2000/svg" class="pause"><path d="M48 64C21.5 64 0 85.5 0 112V400c0 26.5 21.5 48 48 48H80c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48H48zm192 0c-26.5 0-48 21.5-48 48V400c0 26.5 21.5 48 48 48h32c26.5 0 48-21.5 48-48V112c0-26.5-21.5-48-48-48H240z"></path></svg></label>

        <div class="buttons">
            <button @click="goToLoginPage"><a class="button-1" ><span class="spn2">The Stories</span></a></button>
            <button class="button-2" @click="goToRegisterPage">Register</button>
        </div>

        <div class="criminals-pic">
            <img :src="'/pics/criminals.svg'" alt="" class="criminals">
        </div>

        <div class="serial-killers">
            <img :src="'/pics/jeffry-dhamer.svg'" alt="" class="jeffry-dhamer">
            <img :src="'/pics/Raya-Sakina.svg'" alt="" class="jeffry-dhamer">
            <img :src="'/pics/Ted-bundy.svg'" alt="" class="jeffry-dhamer">
            <img :src="'/pics/Papir.svg'" alt="" class="jeffry-dhamer">
        </div>
    </div>

    
    <div class="footer">
       <div class="about-us">
        <h2 class="topic">About us</h2>
        <p class="content">Explore the dark world of crime, revealing the stories behind <br> history's most notorious cases. Through detailed research and<br> captivating storytelling, we bring you closer to the truth of<br> infamous criminals and unsolved mysteries. Join us as we uncover <br>the secrets, one crime at a time.</p>
       </div>
       <div class="contact-us">
        <h1 class="infos">Contact Us</h1>
        <p class="gmail">CrimeStory@gmail.com </p>
        <p class="phone-number">+117 445 778 667 </p>
       </div>
      
      
       <div class="parent">
       <div class="child child-1">
         <button class="button btn-1">
         <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512" fill="#5B3822"><path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path></svg>
       </button>
       </div>
       <div class="child child-2">
         <button class="button btn-2">
       <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512" fill="#5B3822"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path></svg></button>
       </div>
       <div class="child child-3">
         <button class="button btn-3">
       <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 496 512" fill="#5B3822"><path d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3.3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5.3-6.2 2.3zm44.2-1.7c-2.9.7-4.9 2.6-4.6 4.9.3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3.7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3.3 2.9 2.3 3.9 1.6 1 3.6.7 4.3-.7.7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3.7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3.7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z"></path></svg></button>
       </div>
       <div class="child child-4">
         <button class="button btn-4">
       <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512" fill="#5B3822"><path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path></svg></button>
       </div>
       </div>

       <img :src="'pics/t-l-chargement-unscreen.gif'" alt="" class="candle">
    </div>
  </template>
  
  <script>
  export default {
    name: 'Home',
    methods: {
      goToRegisterPage() {
        this.$router.push('/register');
      },
      goToLoginPage() {
        this.$router.push('/login');
      },
    },
    mounted() {
      // Your existing typing effect code here
      const line1 = document.querySelector(".line-1");
      const line2 = document.querySelector(".line-2");
      const text1 = "Every crime "; // First line of text
      const text2Part1 = "has a st"; // First part of the second line
      const text2AfterWax = "ry."; // Text after the wax seal
  
      // Function to type text character by character
      function textTypingEffect(element, text, i = 0, callback = null) {
        if (i === 0) {
          element.textContent = ""; // Clear text at the start
        }
        element.textContent += text[i]; // Add one character at a time
        if (i === text.length - 1) {
          if (callback) callback(); // Call the next function (for the wax seal) when done
          return;
        }
        setTimeout(() => textTypingEffect(element, text, i + 1, callback), 100); // Typing speed
      }
  
      // Function to type the second line and handle the wax seal insertion at the "o" position
      function typeLine2WithWaxSeal(i = 0) {
        if (i < text2Part1.length) {
          line2.textContent += text2Part1[i]; // Type "has a st" normally
          setTimeout(() => typeLine2WithWaxSeal(i + 1), 100);
        } else {
          // Insert the wax seal covering the "o"
          line2.innerHTML += '<span class="waxed-o">o<span class="wax-container"><img src="pics/red-wax.png" alt="wax seal" class="wax-seal"></span></span>';
          
          // Add a pause before continuing to type after the wax seal
          setTimeout(() => {
            typeAfterWaxSeal(); // Start typing the "ry" after the wax seal
          }, 2000); // 2 second delay for pause (adjust as needed)
        }
      }
  
      // Function to append text after the wax seal
      function typeAfterWaxSeal(i = 0) {
        const currentHTML = line2.innerHTML; // Preserve the current HTML with the wax seal
        if (i === text2AfterWax.length) return; // Stop when all characters after wax are typed
  
        line2.innerHTML = currentHTML + text2AfterWax[i]; // Append characters after the wax seal
        setTimeout(() => typeAfterWaxSeal(i + 1), 50);
      }
  
      // Start the typing effect for line 1, then start line 2
      textTypingEffect(line1, text1, 0, () => {
        typeLine2WithWaxSeal(); // Start typing "has a st" and insert the wax seal in the right place
      });
    }
  };
  </script>
  