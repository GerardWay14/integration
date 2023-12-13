const api_key = "DEMO_API_KEY";
const gridContainer = document.getElementById('grid');

function fetchAndDisplayImages() {
    const url = `https://api.thecatapi.com/v1/images/search?limit=20`;

    fetch(url, {
        headers: {
            'x-api-key': api_key
        }
    })
    .then((response) => {
        return response.json();
    })
    .then((data) => {
        clearGrid(); // Clear existing images in the grid

        let imagesData = data;
        imagesData.forEach(function(imageData) {
            let image = document.createElement('img');
            image.src = imageData.url;
            image.style.maxWidth = '95%'; // Set a maximum width for each image
            image.style.margin = '10px'; // Set a margin for each image

            let facts = document.createElement('p');
            let factsurl = "https://meowfacts.herokuapp.com/";
            fetch(factsurl)
            .then((response) => {return response.json();})
            .then (data => {
                facts.style.color = "white";
                facts.innerText = data.data;})
            

            let gridCell = document.createElement('div');
            gridCell.classList.add('col-lg-4'); // Adjust the class based on your layout (12 columns / 3 images per column = 4 columns)
            gridCell.style.textAlign = 'center'; // Center the content  within the grid cell
            gridCell.appendChild(image);
            gridCell.appendChild(facts);

            gridContainer.appendChild(gridCell);
            
        });
        
        


    })
    .catch(function(error) {
        console.log(error);
    });
}

function clearGrid() {
    // Clear existing images in the grid
    while (gridContainer.firstChild) {
        gridContainer.removeChild(gridContainer.firstChild);
    }
}

// Fetch and display images when the page loads
document.addEventListener('DOMContentLoaded', fetchAndDisplayImages);