
function redirectToLogin() {
    window.location.href = "login.html";
  }
  
  function redirectToSignup() {
    window.location.href = "signup.html";
  }
  fetchServices();
  fetchTestimonials();
  
  function fetchServices() {
      fetch("backend/api/services.php")
          .then((response) => response.json())
          .then((services) => {
              // Render services in the services section
          })
          .catch((error) => console.error("Error fetching services:", error));
  }
  
  function fetchTestimonials() {
      fetch("backend/api/testimonials.php")
          .then((response) => response.json())
          .then((testimonials) => {
              // Render testimonials in the testimonials section
          })
          .catch((error) => console.error("Error fetching testimonials:", error));
  }
  function registerUser(userData) {
    fetch("backend/api/register.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(userData),
    })
    .then((response) => response.json())
    .then((data) => {
        if (data.success) {
            // Registration successful
        } else {
            // Handle registration error
        }
    })
    .catch((error) => console.error("Error registering user:", error));
}

function loginUser(userData) {
    fetch("backend/api/login.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(userData),
    })
    .then((response) => response.json())
    .then((data) => {
        if (data.success) {
            // Login successful
        } else {
            // Handle login error
        }
    })
    .catch((error) => console.error("Error logging in user:", error));
}
