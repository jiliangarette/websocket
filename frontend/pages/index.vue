<template>
  <div class="flex flex-col place-items-center">
    <div class="flex">
      <span class="text-2xl font-bold font-helvetica mb-8 text-blue"
        >Notifications
      </span>
      <div
        class="w-10 h-8 ml-4 scale-105 flex justify-center place-items-center">
        <NotificationWebsocket />
      </div>
    </div>
    <div
      class="notification-cards w-screen px-24 flex flex-col place-items-center overflow-y-scroll h-[600px]">
      <div
        v-for="user in users"
        :key="user.id"
        class="card w-full border border-red-200 p-4 mb-2 rounded shadow-md bg-white">
        <p>
          <strong class="text-green-800">{{ user.name }}</strong> played
          <strong>{{ user.game }}</strong> with a score of
          <strong>{{ user.score }}</strong
          >.
        </p>
        <p class="text-gray-500">
          {{ new Date(user.timestamp).toLocaleString() }}
        </p>
      </div>
    </div>
  </div>
</template>

<script setup>
  import axios from "axios";
  import { ref, onMounted } from "vue";

  const users = ref([]);

  const getBackendData = async () => {
    try {
      const response = await axios.get(
        "https://run.mocky.io/v3/a99452f8-32f4-4bfb-9dc6-70babc22abe7"
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
  .notification-cards {
    display: flex;
    flex-direction: column;
    gap: 10px;
  }

  .card {
    background-color: #f9f9f9;
    border: 1px solid #e2e2e2;
    border-radius: 8px;
    padding: 10px;
    width: 50%;
    text-align: left;
  }

  .card p {
    margin: 0;
    font-size: 1em;
    color: #333;
  }

  .card .text-gray-500 {
    font-size: 0.85em;
    color: #777;
  }

  .card strong {
    font-weight: bold;
  }
</style>
