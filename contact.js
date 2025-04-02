document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const statusDiv = document.getElementById('formStatus');
    
    fetch('process_form.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            statusDiv.textContent = 'Thank you! Your message has been sent.';
            statusDiv.className = 'form-status success';
            this.reset();
        } else {
            throw new Error('Form submission failed');
        }
    })
    .catch(error => {
        statusDiv.textContent = 'Sorry, there was an error sending your message. Please try again.';
        statusDiv.className = 'form-status error';
    });
});
