document.getElementById("contactForm").addEventListener("submit", function(event) {
  event.preventDefault();

  // Validate the form here
  const name = document.getElementById("name").value;
  const email = document.getElementById("email").value;
  const phone = document.getElementById("phone").value;
  const website = document.getElementById("website").value;
  const message = document.getElementById("message").value;

  if (!name || !email || !phone || !website || !message) {
    alert("Please fill in all fields.");
    return;
  }

  const gender = document.querySelector('input[name="gender"]:checked');
  if (!gender) {
    alert("Please select a gender.");
    return;
  }

  const lessons = document.querySelectorAll('input[name="lessons"]:checked');
  if (lessons.length === 0) {
    alert("Please select at least one lesson.");
    return;
  }

  // If all validations pass, you can proceed with form submission
  console.log("Form submitted!");
});

document.getElementById("cancelButton").addEventListener("click", function() {
  // Clear or reset the form fields
  document.getElementById("contactForm").reset();
});
