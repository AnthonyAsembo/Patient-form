document.getElementById('patient-form').addEventListener('submit', function(event) {
    
    const lastName = document.getElementById('last_name').value;
    const firstName = document.getElementById('first_name').value;
    
    if (!lastName || !firstName) {
        alert('Last Name and First Name are required!');
        event.preventDefault();
    }
});