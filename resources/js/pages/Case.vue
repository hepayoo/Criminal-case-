<template>
    <div class="searchbar">
        <form action="">
          <input type="text" placeholder="Search...." name="search" />

          <button type="submit">
            <i class="fa fa-search"></i>
          </button>

        </form>
      </div>
      <div class="categories">
        <ul>
          <li><a href="">Missing-people</a></li>
          <li><a href="">Canibal</a></li>
          <li><a href="">Violence</a></li>
          <li><a href="">Rapping</a></li>
        </ul>
      </div>
      <section class="cards-blog latest-blog">
        <div class="card-blog-content">
          <img :src="'/pics/file.svg'" alt="" />
          <div class="content-overlay">
            <h1>Jeffrey Dahmer</h1>
            <p>Infamous Serial killer born in<br> 1978, he was a rapist, a<br> cannibal, a necrophiliac</p>
            <img :src="'/pics/jeffry-criminal.svg'" alt="Jeffrey Dahmer" class="jeffrey-img" />
            
            <router-link
          :to="{
            name: 'SingleCase',
            params: { slug: 'jefrrydhamer' },
          }"
          ><button>Tap to see the Case</button></router-link >
        
          </div>
        </div>

        <div class="card-blog-content">
          <img :src="'/pics/file.svg'" alt="" />
         <div class="content-overlay">
            <h1>Raya and Sekina</h1>
            <p>Two infamous Egyptian sisters<br> for their enrollment in a series <br>of brutal murders in the <br>early 20thcentury</p>
            <img :src="'/pics/raya-sekina-criminals.svg'" alt="Jeffrey Dahmer" class="egypt-img" />
            <button>Tap to see the Case</button>
          </div>
        </div>

        <div class="card-blog-content">
          <img :src="'/pics/file.svg'" alt="" />
          <div class="content-overlay">
            <h1>The papin sisters</h1>
            <p>Christine and lea, french siblings<br> who became infamous for a<br> brutal double murder in 1933.</p>
            <img :src="'/pics/papin-criminals.svg'" alt="Jeffrey Dahmer" class="jeffrey-img" />
            <button>Tap to see the Case</button>
          </div>
        </div>

        <div class="card-blog-content">
          <img :src="'/pics/file.svg'" alt="" />
          <div class="content-overlay">
            <h1>Ted Bundy</h1>
            <p>Was one of the most infamous <br>serial killers in American<br> history. Active in the 1970s</p>
            <img :src="'/pics/ted-criminal.svg'" alt="Jeffrey Dahmer" class="jeffrey-img" />
            <button>Tap to see the Case</button>
          </div>
        </div>

     

    

        <!-- pagination -->
        <div class="pagination" id="pagination">
          <a href="">&laquo;</a>
          <a class="active" href="">1</a>
          <a href="">2</a>
          <a href="">3</a>
          <a href="">4</a>
          <a href="">5</a>
          <a href="">&raquo;</a>
        </div>
      </section>
</template>

<script>
  
export default {
  name: "Case"
};
</script>

<style scoped>
  @import 'resources/css/familydashboard.css';
</style>
