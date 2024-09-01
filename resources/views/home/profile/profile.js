document.getElementById('uploadLogo').addEventListener('change', function(event) {
    const file = event.target.files[0];
    
    if (file) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            const preview = document.querySelector('.upload-Picture img'); // Select the img element inside .upload-Picture
            preview.src = e.target.result; // Set the new image source
            const label = document.querySelector('.upload-Picture label');
            label.textContent="";
        };
        
        reader.readAsDataURL(file); // Read the file as a data URL
    }
});
