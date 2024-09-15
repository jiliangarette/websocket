<template>
  <div>
    <h1>Company Information</h1>
    <table border="1" cellpadding="10" cellspacing="0">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Company Name</th>
          <th>Catch Phrase</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="user in users" :key="user.id">
          <td>{{ user.id }}</td>
          <td>{{ user.name }}</td>
          <td>{{ user.company.name }}</td>
          <td>{{ user.company.catchPhrase }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup>
  import axios from "axios";
  import { ref, onMounted } from "vue";

  const users = ref([]);

  const getBackendData = async () => {
    try {
      const response = await axios.get(
        "https://jsonplaceholder.typicode.com/users"
      );
      users.value = response.data;
    } catch (error) {
      console.log(error);
    }
  };

  onMounted(() => {
    getBackendData();
  });
</script>

<style>
  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }

  th,
  td {
    text-align: left;
    padding: 10px;
  }

  th {
    background-color: #f2f2f2;
  }

  tr:nth-child(even) {
    background-color: #f9f9f9;
  }
</style>
