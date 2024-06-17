document.addEventListener('DOMContentLoaded', function() {
    fetch('get_services.php')
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        const serviceList = document.getElementById('service-list');
        if (data.length === 0) {
            serviceList.innerHTML = '<p>No services available at the moment.</p>';
        } else {
            data.forEach(service => {
                const serviceDiv = document.createElement('div');
                serviceDiv.classList.add('service');

                serviceDiv.innerHTML = `
                    <h3>${service.name}</h3>
                    <p>${service.description}</p>
                    <p>$${service.price}</p>
                `;

                serviceList.appendChild(serviceDiv);
            });
        }
    })
    .catch(error => {
        console.error('There has been a problem with your fetch operation:', error);
        const serviceList = document.getElementById('service-list');
        serviceList.innerHTML = '<p>Error loading services. Please try again later.</p>';
    });
});
