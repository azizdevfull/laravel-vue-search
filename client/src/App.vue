<template>
    <div>
        <input
            v-model="searchQuery"
            @input="search"
            placeholder="Search books"
        />
        <ul>
            <li v-for="book in books" :key="book.id">{{ book.title }}</li>
        </ul>
    </div>
</template>

<script>
import axios from "axios";
export default {
    data() {
        return {
            searchQuery: "",
            books: [],
        };
    },
    methods: {
        search() {
            axios
                .get("http://localhost:8000/api/books/search", {
                    params: { q: this.searchQuery },
                })
                .then((response) => {
                    this.books = response.data;
                });
        },
    },
};
</script>
<style>

</style>