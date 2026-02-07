<script setup lang="ts">
import axiosInstance from '@/axios';
import {ref} from 'vue';
import { RouterLink, RouterView } from 'vue-router'
import CatalogResults from './CatalogResults.vue'

const loading = ref(true);

const user = ref({
    name: '',
    email: '',
});

const isLoggedIn = ref(false);

const getUser = async () => {
    try {
        const response = await axiosInstance.get('/user');
        user.value = response.data;
        isLoggedIn.value = true;
        console.log(response.data);
    } catch (error) {
        console.error(error);
        isLoggedIn.value = false;
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
                <RouterLink to="/add-album" v-if="isLoggedIn">Add Album</RouterLink>
            </ul>
        </div>

        <div id="rightbuttons">
            
            <input type="text" id="searchbar" name="recordsearch" placeholder="Search records...">
            <img id="shoppingcart" src="../images/nav_images/shopping_cart_icon.svg">
            <p>{{user?.name}}</p>
            <form action="/logout" @submit.prevent="logout" v-if="isLoggedIn">
                <button id="logoutbtn">Log out</button>
            </form>
            <RouterLink to="/login" v-if="!isLoggedIn">Log In</RouterLink>
            <RouterLink to="/register" v-if="!isLoggedIn">Sign Up</RouterLink>
        </div>
    </div>
    </nav>


        <main>
            
        <form id="filters">
            <h1>Filters</h1>
                <div id="genre_filters">
                    <h2>Genre</h2>
                    <div class="genre_filter">
                        <input type="checkbox" name="genre1" value="Rock">
                        <label for="genre1"> Rock</label>
                    </div>
                    <div class="genre_filter">
                        <input type="checkbox" name="genre2" value="Jazz">
                        <label for="genre2"> Jazz</label>
                    </div>
                    <div class="genre_filter">
                        <input type="checkbox" name="genre3" value="Electronic">
                        <label for="genre3"> Electronic</label>
                    </div>
                    <div class="genre_filter">
                        <input type="checkbox" name="genre4" value="Pop">
                        <label for="genre4"> Pop</label>
                    </div>
                    <div class="genre_filter">
                        <input type="checkbox" name="genre5" value="Hip-Hop">
                        <label for="genre5"> Hip-Hop</label>
                    </div>
                    <div class="genre_filter">
                        <input type="checkbox" name="genre6" value="Classical">
                        <label for="genre6"> Classical</label>
                    </div>
                </div>

                <div id="price_range_filters">
                    <h2>Price Range</h2>
                    <div id="price_range_filters_inputs">
                        <input type="text" name="min">
                        <p> - </p>
                        <input type="text" name="max"> 
                    </div>
                </div>

                <div id="decade_filters">
                    <h2>Decade</h2>
                    <div class="decade_filter">
                        <input type="checkbox" name="decade1" value="2020">
                        <label for="decade1"> 2020</label>
                    </div>
                    <div class="decade_filter">
                        <input type="checkbox" name="decade2" value="2010">
                        <label for="decade2"> 2010</label>
                    </div>
                    <div class="decade_filter">
                        <input type="checkbox" name="decade3" value="2000">
                        <label for="decade3"> 2000</label>
                    </div>
                    <div class="decade_filter">
                        <input type="checkbox" name="decade4" value="1990">
                        <label for="decade4"> 1990</label>
                    </div>
                    <div class="decade_filter">
                        <input type="checkbox" name="decade5" value="1980">
                        <label for="decade5"> 1980</label>
                    </div>
                    <div class="decade_filter">
                        <input type="checkbox" name="decade6" value="1970">
                        <label for="decade6"> 1970</label>
                    </div>
                </div>
        </form>

        <CatalogResults />

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

<style scoped>
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
  flex-direction: row;
  gap: 50px;
  padding-bottom: 50px;
}

#filters {
  display: flex;
  flex-direction: column;
  gap: 30px;
}

#filters h1 {
  font-size: 24px;
}

#filters h2 {
  font-size: 18px;
  margin-top: 0;
}

#filters input[type="checkbox"] {
  width: 18px;
  height: 18px;
}

.genre_filter, .decade_filter {
  display: flex;
  flex-direction: row;
  gap: 10px;
}


#price_range_filters_inputs {
  display: flex;
  flex-direction: row;
  align-items: center;
  gap: 10px;
  height: 25px;
}

#price_range_filters_inputs input{
  width: 100px;
  height: 20px;
}

#albums h1 {
  font-size: 24px;
  padding-bottom: 30px;
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
  gap: 10px;
  width: 220px;
  height: 325px;
  border: solid #E4E4E4 1px;
  border-radius: 14px;
}

#album_data img {
  width: 100%;
  height: 220px;
  border-radius: 14px;
}

#album_data h3 {
  font-size: 20px;
  line-height: 24px;
  margin: 0;
  margin-left: 15px;
  margin-right: 15px;
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