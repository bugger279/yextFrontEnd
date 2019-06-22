var fetchedData = document.querySelector(".fetchedData");
const proxy = 'https://cors-anywhere.herokuapp.com/';
const apiLink = `http://localhost/123local-API/product/read.php`;

fetch(apiLink)
    .then(data =>  data.json())
    .then(response => {
        let data = response.records;
        console.log(data);
        var html = '';
        data.forEach(location => {
            const bgImg = location.images[0].url;
            if (bgImg == null) {
                bgImg == "seo-for-multi-location-biz.png";
            }
            html+= `
    <div class="col s3">
        <div class="card large">
            <div class="card-image">
            <img src="${location.images[0].url}">
            <span class="card-title">${location.name}</span>
            </div>
            <div class="card-content">
            <p>${location.description}</p>
            <div class="address">
            <ul class="collapsible popout">
                <li>
                    <div class="collapsible-header"><i class="material-icons">filter_drama</i>Address</div>
                    <div class="collapsible-body"><p>${location.address.address}, ${location.address.address2}, ${location.address.city}, ${location.address.displayAddress}, ${location.address.postalCode}, ${location.address.state}, ${location.address.countryCode}</p></div>
                </li>
            </ul>
            </div>
            </div>
            <div class="card-action">
            <a href="#">This is a link</a>
            </div>
        </div>
    </div>
            `;
        });
        fetchedData.innerHTML = html;
    });


// var locCount = document.querySelector('.fetched-locations');
// var cities;

// function searchCall(cityName) {
//   var search_api = "".concat(proxy, "https://api.yext.com/v2/accounts/me/locationsearch?api_key=").concat(apiKey, "&v=").concat(year).concat(month).concat(date, "&filters=[{\"city\":{\"contains\":[\"").concat(cityName, "\"]}}]");
//   fetch(search_api).then(function (data) {
//     return data.json();
//   }).then(function (response) {
//     locCount.innerHTML = response.response.count;
//     console.log(cities = response.response.locations);
//     var html = '';

//     if (cities.length > 0) {
//       cities.forEach(function (city) {
//         html += "\n                <div class=\"LocData\">\n                <ul>\n                <li>Id Number: </li>\n                <li>".concat(city.id, "</li>\n                </ul>\n                <ul>\n                <li>Account Id: </li>\n                <li>").concat(city.accountId, "</li>\n                </ul>\n                <ul>\n                <li>Location Name: </li>\n                <li>").concat(city.locationName, "</li>\n                </ul>\n                <ul>\n                <li>Schema Type: </li>\n                <li>").concat(city.schemaTypes[0], "</li>\n                </ul>\n                <ul>\n                <li>Address: </li>\n                <li>").concat(city.address, ", ").concat(city.address2, "</li>\n                </ul>\n                <ul>\n                <li>City: </li>\n                <li> ").concat(city.city, "</li>\n                </ul>\n                <ul>\n                <li>Zip: </li>\n                <li>").concat(city.zip, ", ").concat(city.countryCode, "</li>\n                </ul>\n            </div>\n                ");
//       });
//     } else {
//       html += "\n                <h4>No data found</h4>\n            ";
//     }

//     newHtml.innerHTML = html;
//   });
// }

// document.querySelector('#searchBtn').addEventListener('click', function () {
//   var cityName = document.querySelector('#cityName').value;
//   searchCall(cityName);
// });
// document.querySelector('#viewAll').addEventListener('click', callAPI);
// document.getElementById('searchForm').addEventListener('submit', function (e) {
//   e.preventDefault();
// })