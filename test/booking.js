const bookingForm = document.getElementById('booking-form');

bookingForm.addEventListener('submit', (event) => {
  event.preventDefault();

  const formData = new FormData(bookingForm);

  const bookingData = {
    name: formData.get('name'),
    email: formData.get('email'),
    phone: formData.get('phone'),
    movingDate: formData.get('moving-date'),
    service: formData.get('service'),
    fromAddress: formData.get('from-address'),
    toAddress: formData.get('to-address'),
    message: formData.get('message'),
  };

  // Send booking data to the server
  submitBookingData(bookingData);
});

function submitBookingData(bookingData) {
  
  const url = 'booking.php';

  fetch(url, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(bookingData),
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      return response.json();
    })
    .then((data) => {
      // Display a success message or redirect the user
      alert('Booking submitted successfully');
    })
    .catch((error) => {
      console.error('There was a problem with the fetch operation:', error);
    });
}
