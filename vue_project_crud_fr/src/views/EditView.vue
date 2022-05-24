<template>
  <div>
    <input type="text" v-model="book.name" name="name">

    <input type="text" v-model="book.author" name="author">

    <input type="text" v-model="book.collection" name="collection">

    <input type="text" v-model="book.ISBN" name="ISBN">

    <input type="text" v-model="book.dimensions" name="name">

    <input type="text" v-model="book.designation" name="name">

    <div @click="saveBook">SAVE</div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "EditView",
  data() {
    return {
      book: {}
    }
  },

  methods: {
    async saveBook() {
      await axios.post(
          'http://localhost:8000/api/update.php',
          {
            id: this.book.id,
            name: this.book.name,
            author: this.book.author,
            collection: this.book.collection,
            ISBN: this.book.ISBN,
            dimensions: this.book.dimensions,
            designation: this.book.designation,
          }
      )
      await this.$router.push({name: 'list'});
    },
  },

  async created() {
    const {bookId} = this.$route.params
    console.log(bookId)
    const apiDetailsUri = 'http://localhost:8000/api/single_read.php/?id=' + bookId
    const oneBook = await axios.get(apiDetailsUri)
    this.book = oneBook.data
  }
}
</script>

<style scoped>

</style>