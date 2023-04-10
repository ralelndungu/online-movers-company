
function redirectToLogin() {
    window.location.href = "login.html";
  }
  
  function redirectToSignup() {
    window.location.href = "signup.html";
  }
  document.addEventListener("DOMContentLoaded", function () {
    // Fetch user's name from PHP session
    fetch("get_user_name.php")
      .then((response) => response.text())
      .then((name) => {
        const userNameElement = document.getElementById("user-name");
        const userAvatarElement = document.getElementById("user-avatar");
  
        // Set user's name in the HTML
        userNameElement.textContent = name;
  
        // Set user's avatar with the first letter of their name
        userAvatarElement.textContent = name.charAt(0).toUpperCase();
      });
  });
  
