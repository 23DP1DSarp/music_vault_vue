<script setup lang="ts">
import axiosInstance from '@/axios';
import {ref} from 'vue';

interface Album {
  title: string;
  author: string;
  release_date: Date;
  genre: string;
  cover: string;
}

const albums = ref<Album[]>([]);

const getAlbums = async () => {
  try {
    const response = await axiosInstance.get('/');
    albums.value = response.data;
    console.log(response.data);
  } catch (error) {
    console.error(error);
  }
}

const getImageUrl = (path: string): string => {
  if (path.startsWith('http')) {
    return path;
  }

  return `${'http://localhost:8000'}/storage/${path}`;
};

getAlbums();
</script>

<template>
    <div id="albums">
            <h2>All Albums</h2>
            <div id="album_cards">
            <div id="album_data" v-for="album in albums">
                    
                        <img v-if="album.cover"
            :src="getImageUrl(album.cover)" 
            :alt="album.title">
                    
                    <a href="/album_info/{{$album->id}}"><h3>{{ album.title }}</h3></a>
                    <p>{{ album.author }}</p>
                    <div id="genre_and_year">
                    <p>{{ album.genre }}</p>
                    <p>&nbsp;•&nbsp;</p>
                    <p>{{ new Date(album.release_date).getFullYear()}}</p>
                    </div>
        </div>
            </div>
        </div>
</template>


