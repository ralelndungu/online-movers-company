document.addEventListener("DOMContentLoaded", () => {
    const addServiceForm = document.getElementById("addServiceForm");
    const addTestimonialForm = document.getElementById("addTestimonialForm");
  
    addServiceForm.addEventListener("submit", (e) => {
      e.preventDefault();
      addService(new FormData(addServiceForm));
    });
  
    addTestimonialForm.addEventListener("submit", (e) => {
      e.preventDefault();
      addTestimonial(new FormData(addTestimonialForm));
    });
  
    getInquiries();
  });
  
  async function addService(formData) {
    try {
      const response = await fetch("backend/api/create_service.php", {
        method: "POST",
        body: formData,
      });
  
      if (response.ok) {
        alert("Service added successfully");
      } else {
        alert("Failed to add service");
      }
    } catch (error) {
      alert("Error: " + error);
    }
  }
  
  async function addTestimonial(formData) {
    try {
      const response = await fetch("backend/api/create_testimonial.php", {
        method: "POST",
        body: formData,
      });
  
      if (response.ok) {
        alert("Testimonial added successfully");
      } else {
        alert("Failed to add testimonial");
      }
    } catch (error) {
      alert("Error: " + error);
    }
  }
  
  async function getInquiries() {
    try {
      const response = await fetch("backend/api/get_inquiries.php");
  
      if (response.ok) {
        const inquiries = await response.json();
        displayInquiries(inquiries);
      } else {
        alert("Failed to fetch inquiries");
      }
    } catch (error) {
      alert("Error: " + error);
    }
  }
  
  function displayInquiries(inquiries) {
    const inquiriesList = document.getElementById("inquiriesList");
    inquiriesList.innerHTML = "";
  
    inquiries.forEach((inquiry) => {
      const inquiryElement = document.createElement("div");
      inquiryElement.innerHTML = `
        <h3>${inquiry.name}</h3>
        <p>Email: ${inquiry.email}</p>
        <p>Phone: ${inquiry.phone}</p>
        <p>Message: ${inquiry.message}</p>
      `;
      inquiriesList.appendChild(inquiryElement);
    });
  }
  