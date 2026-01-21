<script setup lang="ts">
const { user, logout } = useAuth()
</script>

<template>
  <div class="p-6">
    <div class="flex justify-between items-center">
      <h1 class="text-2xl font-bold">
        Dashboard
      </h1>

      <button
        @click="logout"
        class="bg-red-500 text-white px-4 py-2 rounded"
      >
        Logout
      </button>
    </div>

    <div class="mt-6">
      <div v-if="user?.role === 'student'">
        📘 <b>Student dashboard</b><br>
        Je ziet alleen jouw lessen
      </div>

      <div v-else-if="user?.role === 'leraar'">
        ✏️ <b>Leraar dashboard</b><br>
        Je beheert jouw vakken
      </div>

      <div v-else-if="user?.role === 'roostermaker'">
        📊 <b>Roostermaker dashboard</b><br>
        Filters per klas & leraar
      </div>
    </div>
  </div>
</template>
