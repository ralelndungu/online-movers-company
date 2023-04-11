function redirectToLogin() {
  window.location.href = "login.html";
}

function redirectToSignup() {
  window.location.href = "signup.html";
}

function updateAuthButtons(loggedIn, name) {
  const loginBtn = document.getElementById("loginBtn");
  const signupBtn = document.getElementById("signupBtn");
  const userAvatarContainer = document.getElementById("user-avatar-container");
  const userAvatar = document.getElementById("user-avatar");

  if (loggedIn) {
    loginBtn.classList.add("hidden");
    signupBtn.classList.add("hidden");
    userAvatarContainer.classList.remove("hidden");
    userAvatar.src = `https://ui-avatars.com/api/?name=${encodeURIComponent(name)}&size=40&background=4CAF50&color=ffffff&bold=true`;
  } else {
    loginBtn.classList.remove("hidden");
    signupBtn.classList.remove("hidden");
    userAvatarContainer.classList.add("hidden");
  }
}

document.addEventListener("DOMContentLoaded", function () {
  fetch("check_login.php")
    .then((response) => response.json())
    .then((data) => {
      if (data.loggedIn) {
        updateAuthButtons(true, data.name);
      } else {
        updateAuthButtons(false);
      }
    });
});

function toggleDropdownMenu() {
  const dropdownMenu = document.getElementById("dropdown-menu");
  dropdownMenu.classList.toggle("hidden");
}
