document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form[action*="cape.upload"]');
    const capeInput = document.getElementById('capeInput');
    const capePreview = document.querySelector('.cape-preview');
    const uploadButton = form.querySelector('button[type="submit"]');
    const originalButtonText = uploadButton.textContent;

    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Show loading state
            uploadButton.disabled = true;
            uploadButton.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Uploading...';

            const formData = new FormData(form);

            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show success message
                    const alert = document.createElement('div');
                    alert.className = 'alert alert-success alert-dismissible fade show mt-3';
                    alert.innerHTML = `
                        ${data.message}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    `;
                    form.insertAdjacentElement('beforebegin', alert);

                    // Update cape preview immediately
                    if (capePreview) {
                        const timestamp = new Date().getTime();
                        const img = capePreview.querySelector('img');
                        if (img) {
                            // Add timestamp to force browser to reload the image
                            img.src = img.src.split('?')[0] + '?' + timestamp;
                        } else {
                            location.reload(); // Fallback if preview element not found
                        }
                    } else {
                        location.reload(); // Fallback if preview element not found
                    }
                } else {
                    throw new Error(data.message || 'Upload failed');
                }
            })
            .catch(error => {
                // Show error message
                const alert = document.createElement('div');
                alert.className = 'alert alert-danger alert-dismissible fade show mt-3';
                alert.innerHTML = `
                    ${error.message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                `;
                form.insertAdjacentElement('beforebegin', alert);
            })
            .finally(() => {
                // Reset button state
                uploadButton.disabled = false;
                uploadButton.textContent = originalButtonText;
                capeInput.value = ''; // Clear the file input
            });
        });
    }
});
