<script setup lang="ts">
import axiosInstance from '@/axios';
import {ref} from 'vue';


const loading = ref(true);

const user = ref({
    name: '',
    email: '',
});


const getUser = async () => {
    try {
        const response = await axiosInstance.get('/user');
        user.value = response.data;
        console.log(response.data);
    } catch (error) {
        console.error(error);
    } finally {
        loading.value = false;
    }
};

const logout = async () => {
    try{
        const response = await axiosInstance.post('/logout');
        console.log(response.data);
    } catch (error) {
        console.error(error);
    } finally {
        window.location.href='/';
    }
}





getUser();
</script>

<template>

<body v-if="loading !== true">
    <nav>
        <div id="navwrapper">
        <RouterLink to="/">
            <div id="logo">
            <img src="../images/nav_images/vinyl_icon.svg">
            <p>MusicVault</p>
        </div></RouterLink>

        <div id="navbuttons">
            <ul>
                <li>New Releases</li>
                <li>Genres</li>
                <li>Artists</li>
                <li>Forums</li>
                <li><RouterLink to="/add-album">Add Album</RouterLink></li>
            </ul>
        </div>

        <div id="rightbuttons">
            
            <input type="text" id="searchbar" name="recordsearch" placeholder="Search records...">
            <img id="shoppingcart" src="../images/nav_images/shopping_cart_icon.svg">
            <p>{{user?.name}}</p>
            <form action="/logout" @submit.prevent="logout">
                <button id="logoutbtn">Log out</button>
            </form>
            <RouterLink to="/login">Log In</RouterLink>
            <RouterLink to="/register">Sign Up</RouterLink>
        </div>
    </div>
    </nav>


    <main>
        <div id="hero_section">


            

            <div id="left_side">
                <h1>Discover Your Next Favorite Record</h1>
                <p id="subtext">From rare pressings to the latest releases. Curated vinyl records for every music lover.</p>

                <div id="hero_buttons">
                    <button id="shop_button">Shop New Releases</button>
                    <button id="browse_button">Browse Collection</button>
                </div>

                <div id="stats">
                    <div class="stat">
                        <h2>10K+</h2>
                        <p>Records in Stock</p>
                    </div>

                    <div class="stat">
                        <h2>500+</h2>
                        <p>Artists</p>
                    </div>

                    <div class="stat">
                        <h2>50+</h2>
                        <p>Genres</p>
                    </div>
                </div>
            </div>

            <div id="right_side">
                <img src="../images/main_page_images/Vinyl_records_collection.png">
            </div>
            
            <div id="order_items">
                
            </div>


        </div>


        <div id="record_browse">
            <h4>Browse Records</h4>
            <p id="results_count">6 records found</p>

            <div id="filters">
                <form action="/show_albums" method="GET">
                    <label>Genre:</label>
                    <button class="form_button">All</button>
                    <button class="form_button" type="submit" name="genre" value="Rock">Rock</button>
                    <button class="form_button" name="genre" value="Jazz">Jazz</button>
                    <button class="form_button" name="genre" value="Electronic">Electronic</button>
                    <button class="form_button" name="genre" value="Pop">Pop</button>
                    <button class="form_button" name="genre" value="Hip-Hop">Hip-Hop</button>
                    <button class="form_button" name="genre" value="Classical">Classical</button>

                    <label>Condition:</label>
                    <select name="condition" id="condtion_select">
                        <option value="brand_new">Brand New</option>
                        <option value="new">New</option>
                        <option value="used">Used</option>
                    </select>

                    <label>Sort By:</label>
                    <select name="sort" id="sort_select">
                        <option>Name: A-Z</option>
                        <option>Name: Z-A</option>
                        <option>Price: Highest</option>
                        <option>Price: Lowest</option>
                    </select>
                </form>

                


            </div>
        </div>

        <div id="albums">
            <h2>All Albums</h2>
            <div id="album_cards">
            <div></div>
            <div>
              <img>
              
              <p></p>
              <div id="genre_and_year">
                <p></p>
                <p>&nbsp;•&nbsp;</p>
                <p></p>
              </div>
            <p>No albums found.</p>
            </div>
        </div>
    </div>
    </main>

    <footer>
        <div id="footer_wrapper">
        <div id="footer_top">
            <div id="footer_info">
                <div id="footer_logo">
                    <img src="../images/footer_images/vinyl_icon.svg">
                    <p>MusicVault</p>
                </div>
                <p id="footer_info_text">
                    Your premier destination for music records. Discover,
                    collect, and enjoy music the way it was meant to be
                    heard.
                </p>

                <div id="icons">
                    <img class="icon" src="../images/footer_images/facebook_icon.svg">
                    <img class="icon" src="../images/footer_images/instagram_icon.svg">
                    <img class="icon" src="../images/footer_images/twitter_icon.svg">
                    <img class="icon" src="../images/footer_images/youtube_icon.svg">
                </div>
                
            </div>

            <div>
                <h6>Quick Links</h6>

                <ul>
                    <li>New Releases</li>
                    <li>Pre-Orders</li>
                    <li>Sale Items</li>
                    <li>Rare Finds</li>
                    <li>Gift Cards</li>
                </ul>
            </div>

            <div>
                
                <h6>Genres</h6>

                <ul>
                    <li>Rock</li>
                    <li>Jazz</li>
                    <li>Electronic</li>
                    <li>Hip-Hop</li>
                    <li>Classical</li>
                </ul>
            </div>

            <div id="subscribe_form">
                <h6>Stay Updated</h6>
                <p>Get notified about new releases and exclusive deals.</p>

                <form action="" method="post">
                    <input id="email_input" placeholder="Enter your email" name="subscription-email" type="email" required>
                    <input id="subscribe_form_submit" type="submit" value="Subscribe">
                </form>
            </div>
        </div>

        
        <div id="footer_bottom">

            <ul>
                <li>Privacy Policy</li>
                <li>Terms of Service</li>
                <li>Shipping Info</li>
                <li>Returns</li>
            </ul>

            <p>&copy; 2025 MusicVault. All rights reserved.</p>

        </div>
        </div>
    </footer>
</body>
</template>

<style>
@font-face {
  font-family: Segoe UI Symbol;
  src: url(/fonts/segoe-ui-symbol.ttf);
}



html {
  font-family: Segoe UI Symbol, 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

body {
  padding: 0;
  margin: 0;
}

a {
  text-decoration: none;
  color: #0A0A0A;
}

a:visited {
  color: #0A0A0A;
}

nav {
  border-bottom: solid #ECECF0 1px;
}

#navwrapper {
  width: 80vw;
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  margin: 0 auto;
  padding: 0;
  font-size: 19.53px;
  color: #0A0A0A;
}

#logo {
  display: flex;
  flex-direction: row;
  gap: 5px;
  font-size: 19.53px;
  line-height: 28px;
  letter-spacing: -0.5px;
}

#searchbar {
  background-color: #F3F3F5;
  border-style: none;
  width: 256px;
  height: 36px;
  color: #717182;
  padding: 0px 0px 0px 10px;
  border-radius: 8px;
  font-family: Segoe UI Symbol, 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  font-size: 14px;
}

#shoppingcart {
  width: 16px;
  height: 16px;
  padding: 9px;
  border-style: solid;
  border: #ECECF0 solid 1px;
  border-radius: 8px;
  text-align: center;
  cursor: pointer;
}

#navbuttons {
  display: flex;
  flex-direction: row;
  justify-content: center;
  margin: 0 auto;
  font-size: 16px;
  line-height: 24px;
  letter-spacing: 0px;
  align-items: center;
}

#navbuttons ul {
    display: flex;
    flex-direction: row;
    padding: 0;
    list-style: none;
    gap: 24px;
}

#rightbuttons {
    display: flex;
    flex-direction: row;
    gap: 20px;
    align-items: center;
    font-size: 16px;
    line-height: 28px;
    letter-spacing: -0.5px;
}

#logoutbtn {
  background-color: transparent;
  border-style: none;
  font-size: 16px;
  line-height: 28px;
  letter-spacing: -0.5px;
  color: #0A0A0A;
  font-family: Segoe UI Symbol, 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  cursor: pointer;
}

#logoutbtn:hover {
  color: #717182;
}

main {
  width: 80vw;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
}

#order_items {
  width: 0px;
  height: 100%;
  background-color: #2222b1;
  z-index: 1;
  position: absolute;
  right: 0;
  transition: 0.5s;
}

#hero_section {
  height: 485px;
  display: flex;
  flex-direction: row;
  margin-bottom: 150px;
}

#left_side {
  width: 50%;
  height: 360px;
  display: flex;
  flex-direction: column;
  margin-top: 150px;
}

#left_side h1 {
  width: 500px;
  font-size: 60px;
  font-weight: normal;
  line-height: 60px;
  letter-spacing: -1.5px;
  margin-bottom: 5px;
}

#subtext {
  width: 500px;
  font-size: 20px;
  line-height: 28px;
  letter-spacing: 0px;
  margin-bottom: 0;
  color: #717182;
}

#hero_buttons {
  display: flex;
  flex-direction: row;
  gap: 15px;
  margin-top: 40px;
  margin-bottom: 0;
}

#shop_button {
  width: 230px;
  height: 40px;
  background-color: #030213;
  color: #FFFFFF;
  border-style: none;
  border-radius: 8px;
  text-align: center;
  vertical-align: middle;
  font-family: Segoe UI Symbol, 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  font-size:18px;
  line-height: 20px;
  letter-spacing: 0px;
  cursor: pointer;
}

#browse_button {
  width: 210px;
  height: 40px;
  background-color: #FFFFFF;
  color: #0A0A0A;
  border: solid rgba(0, 0, 0, .1) 1px;
  border-radius: 8px;
  text-align: center;
  vertical-align: middle;
  font-family: Segoe UI Symbol, 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  font-size:18px;
  line-height: 20px;
  letter-spacing: 0px;
  cursor: pointer;
}

#stats {
  margin-top: 50px;
  display: flex;
  flex-direction: row;
  gap: 32px;
}

.stat {
  display: flex;
  gap: 10px;
  flex-direction: column;
  text-align: center;
}

.stat h2 {
  font-size: 24px;
  line-height: 32px;
  letter-spacing: 0px;
  margin: 0;
}

.stat p {
  margin: 0;
  font-size:14px;
  line-height: 20px;
  letter-spacing: 0px;
  color: #717182;
}

#right_side {
  width: 728px;
  height: 486px;
  margin-top: 150px;
}

#record_browse {
  margin: 0;
  margin-top: 150px;
}

#record_browse h4 {
  font-size:30px;
  line-height: 36px;
  letter-spacing: 0px;
  margin: 0;
}

#results_count {
  font-size:16px;
  line-height: 24px;
  letter-spacing: 0px;
  color: #717182;
  margin-top: 15px;
}

#filters {
  margin-left: 15px;
  margin-bottom: 50px;
  display: flex;
  flex-direction: row;
  align-items: center;
}

#filters form {
  display: flex;
  flex-direction: row;
  align-items: center;
  gap: 10px;
}

#album_cards {
  display: flex;
  flex-direction: row;
  gap: 25px;
  width: fit-content;
  margin-bottom: 50px;
}

#album_data {
  display: flex;
  flex-direction: column;
  gap: 24px;
  max-width: 280px;
  min-height: 470px;
  border: solid #E4E4E4 1px;
  border-radius: 14px;
}

#album_data img {
  width: 100%;
  height: 256px;
  border-radius: 14px;
}

#album_data h3 {
  font-size: 20px;
  line-height: 24px;
  margin: 0;
  margin-left: 15px;
}

#album_data p {
  margin: 0;
  margin-left: 15px;
  font-size: 16px;
  line-height: 20px;
  color: #717182;
}

#genre_and_year {
  display: flex;
  flex-direction: row;
}

#add_to_collection {
  margin: 0 auto;
}


#add_to_collection_btn {
  width: 250px;
  height: 40px;
  background-color: #FFFFFF;
  color: #0A0A0A;
  font-size: 18px;
  font-weight: normal;
  line-height: 24px;
  letter-spacing: 0px;
  font-family: Segoe UI Symbol, 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  border-radius: 8px;
  border: solid 1px;
  cursor: pointer;
}

.form_button {
  height: 32px;
  background-color: #FFFFFF;
  border: solid rgba(0, 0, 0, .1) 1px;
  border-radius: 8px;
  padding: 15px;
  font-family: Segoe UI Symbol, 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  font-size:14px;
  line-height: 20px;
  letter-spacing: 0px;
  display: flex;
  flex-direction: row;
  align-items: center;
  cursor: pointer;
}

#filters select {
  width: 128px;
  height: 36px;
  background-color: #F3F3F5;
  border-style: none;
  border-radius: 8px;
  font-family: Segoe UI Symbol, 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  font-size: 14px;
  line-height: 20px;
  letter-spacing: 0px;
}

#album_cards {
  display: flex;
  flex-direction: row;
  gap: 25px;
}

#album_data {
  display: flex;
  flex-direction: column;
  width: 358px;
  height: 434px;
}

footer {
  border-top: solid #ECECF0 1px;
}

footer h6 {
  font-size: 16px;
  margin-top: 15px;
  line-height: 24px;
}

#footer_wrapper {
  width: 80vw;
  margin: 0 auto;
  padding-left: 100px;
  padding-right: 100px;
  padding-top: 50px;
  padding-bottom: 50px;
}


#footer_top {
  display: flex;
  flex-direction: row;
  padding-bottom: 20px;
  margin: 0 auto;
  border-bottom: solid #ECECF0 1px;
}

#footer_info {
  display: flex;
  flex-direction: column;
  width: 357px;
  margin-right: 67px;
  font-size: 13.89px;
  line-height: 20px;
  letter-spacing: 0px;
  color: #717182;
}

#footer_info_text {
  width: 317.84px;
  height: 54px;
  margin-bottom: 20px;
}

#footer_info p {
  margin-top: 15px;
}

#footer_logo {
  display: flex;
  flex-direction: row;
  align-items: center;
  font-size: 17.72px;
  font-weight: normal;
  line-height: 28px;
  letter-spacing: -0.5px;
  gap: 5px;
  color: #0A0A0A;
}

#footer_logo img {
  width: 24px;
  height: 24px;
}

#icons {
  display: flex;
  flex-direction: row;
  gap: 8px;
}

.icon {
  width: 16px;
  height: 16px;
  padding: 6px;
  border: #ECECF0 solid 1px;
  border-radius: 8px;
  cursor: pointer;
}

#footer_top ul {
  width: 18vw;
  font-size: 14px;
  line-height: 20px;
  letter-spacing: 0px;
  color: #717182;
  display: flex;
  flex-direction: column;
  gap: 14px;
  list-style: none;
  padding: 0;
}

#subscribe_form p {
  color: #717182;
  line-height: 20px;
  letter-spacing: 0px;
}

#email_input {
  background-color: #F3F3F5;
  border-style: none;
  width: 352px;
  height: 36px;
  color: #717182;
  padding: 0px 0px 0px 10px;
  border-radius: 8px;
  font-family: Segoe UI Symbol, 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  font-size: 14px;
}

#subscribe_form_submit {
  margin-top: 5px;
  width: 362px;
  height: 32px;
  border-style: none;
  border-radius: 8px;
  background-color: #030213;
  color: #E4E4E4;
  font-size: 14px;
  line-height: 20px;
  letter-spacing: 0px;
  font-family: Segoe UI Symbol, 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  cursor: pointer;
}

#footer_bottom {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  font-size: 14px;
  line-height: 20px;
  letter-spacing: 0px;
  color: #717182;
  margin-top: 40px;
}

#footer_bottom ul {
  display: flex;
  flex-direction: row;
  gap: 24px;
  list-style: none;
  padding: 0;
}

</style>
