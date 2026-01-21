export const useAuth = () => {
  const user = useState<any | null>("user", () => null)

  const fetchUser = async () => {
    try {
      user.value = await $fetch(
        "http://localhost/backend/api/me.php",
        { credentials: "include" }
      )
    } catch {
      user.value = null
    }
  }

  const logout = async () => {
    await $fetch("http://localhost/backend/api/logout.php", {
      credentials: "include",
    })
    user.value = null
    navigateTo("/login")
  }

  return { user, fetchUser, logout }
}
