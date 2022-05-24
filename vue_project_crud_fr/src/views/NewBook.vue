<template>
  <div>
    <input type="text" v-model="book.name">

    <input type="text" v-model="book.author">

    <input type="text" v-model="book.collection">

    <input type="text" v-model="book.ISBN">

    <input type="text" v-model="book.volume">

    <input type="text" v-model="book.designation">

    <div @click="newBook">NEW</div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "NewBook",
  data() {
    return {
      book: {}
    }
  },

  methods: {
    async newBook() {
      await axios.post(
          'http://localhost:8000/api/create.php',
          {
            id: this.book.id,
            name: this.book.name,
            author: this.book.author,
            collection: this.book.collection,
            ISBN: this.book.ISBN,
            dimensions: this.book.volume,
            designation: this.book.designation,
          }
      )
      await this.$router.push({name: 'list'});
    },
  },
}


</script>

<style scoped>

</style>