<script setup lang="ts">
const email = ref("")
const password = ref("")
const error = ref("")
const { fetchUser } = useAuth()

const login = async () => {
  error.value = ""

  try {
    await $fetch("http://localhost/backend/api/login.php", {
      method: "POST",
      body: { email: email.value, password: password.value },
      credentials: "include"
    })

    await fetchUser()
    navigateTo("/dashboard")
  } catch {
    error.value = "Email of wachtwoord onjuist"
  }
}
</script>

<template>
  <div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white p-6 rounded shadow w-96">
      <h1 class="text-xl font-bold mb-4">Inloggen</h1>

      <input
        v-model="email"
        placeholder="Email"
        class="w-full border p-2 rounded"
      />

      <input
        v-model="password"
        type="password"
        placeholder="Wachtwoord"
        class="w-full border p-2 rounded mt-2"
      />

      <button
        @click="login"
        class="w-full bg-blue-600 text-white p-2 rounded mt-4"
      >
        Login
      </button>

      <p v-if="error" class="text-red-500 mt-2">
        {{ error }}
      </p>
    </div>
  </div>
</template>
