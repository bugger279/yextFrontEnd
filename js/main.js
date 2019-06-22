// Locations
var fetchedLocations = document.querySelector(".locations .row");
const requestLocations = new Request('locationsResponse.json', {
    headers: new Headers({
        'Key': 'ieurtjkosakwehua1457821244amsnashjad',
        'Access-Control-Allow-Origin':'*'
    })
});
fetch(requestLocations, { mode: 'no-cors' })
    .then(data => data.json())
    .then(response => {
        let data = response.records;
        console.log(data);
        var locations = '';
        data.forEach(location => {
            locations+=`
                <div class="location-wrappper col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title location-name"><a href="single.html">${location.name}</a></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><a href="tel:${location.phones[0].number.number}">${location.phones[0].number.number}</a></h6>
                            <p class="card-text location-address">${location.address.displayAddress}</p>
                            <a href="single.html?id=${location.partnerID}" class="card-link"><button type="button" class="btn btn-primary">Read More</button></a>
                        </div>
                    </div>
                </div>`;
        });
        fetchedLocations.innerHTML = locations;
    });

// Categories
var fetchedCategories = document.querySelector(".categories-sidebar .list-group");
const requestCategories = new Request('categoriesResponse.json', {
    headers: new Headers({
        'Key': 'ieurtjkosakwehua1457821244amsnashjad',
        'Access-Control-Allow-Origin':'*'
    })
});
fetch(requestCategories, { mode: 'no-cors' })
    .then(data => data.json())
    .then(response => {
        let data = response.categories;
        var categories = '';
        data.forEach(category => {
            categories+=`
                <li class="list-group-item">${category.categoryName}</li>
            `;
        });
        fetchedCategories.innerHTML = categories;
    });