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
      <div v-if="isLoading" class="absolute bottom-1/2 right-1/2">
        <LoadingSpinner />
      </div>
      <div
        v-for="participant in participants"
        :key="participant.id"
        class="card w-full border border-red-200 p-4 mb-2 rounded shadow-md bg-white">
        <p>
          <strong class="text-green-800">{{ participant.participant }}</strong>
          played <strong>{{ participant.quiz }}</strong> with a score of
          <strong>{{ participant.score }}</strong
          >.
        </p>
        <p class="text-gray-500">
          {{ new Date(participant.completed_at).toLocaleString() }}
        </p>
      </div>
    </div>
  </div>
</template>

<script setup>
  import axios from "axios";
  import { ref, onMounted } from "vue";
  const isLoading = ref(true);
  const participants = ref([]);

  const getBackendData = async () => {
    try {
      const response = await axios.get(
        "http://127.0.0.1:8000/api/participants-summary-quiz"
        // "https://run.mocky.io/v3/a99452f8-32f4-4bfb-9dc6-70babc22abe7"
      );
      participants.value = response.data;
    } catch (error) {
      console.log(error);
    } finally {
      isLoading.value = false;
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
