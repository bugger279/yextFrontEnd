// Fetching Url
function parseURLParams(url) {
    var queryStart = url.indexOf("?") + 1,
        queryEnd   = url.indexOf("#") + 1 || url.length + 1,
        query = url.slice(queryStart, queryEnd - 1),
        pairs = query.replace(/\+/g, " ").split("&"),
        parms = {}, i, n, v, nv;

    if (query === url || query === "") return;

    for (i = 0; i < pairs.length; i++) {
        nv = pairs[i].split("=", 2);
        n = decodeURIComponent(nv[0]);
        v = decodeURIComponent(nv[1]);

        if (!parms.hasOwnProperty(n)) parms[n] = [];
        parms[n].push(nv.length === 2 ? v : null);
    }
    return parms;
}

var urlString = window.location.href;
urlParams = parseURLParams(urlString);

var listId = urlParams['id'][0];

// console.log(listId);
// Displaying Data
// Locations
var singleLocations = document.querySelector(".locations");
var singlePhones = document.querySelector(".location-phones");
var singleCategories = document.querySelector(".location-categories");
var singleEmails = document.querySelector(".location-emails");
var singleHours = document.querySelector(".location-hours");
var singleImages = document.querySelector(".location-images");
var singleVideos = document.querySelector(".location-videos");
var singleUrls = document.querySelector(".location-urls");
var singleKeywords = document.querySelector(".location-keywords");
var singleLists = document.querySelector(".location-lists");
var singleSpecialities = document.querySelector(".location-specialities");
var singleBrands = document.querySelector(".location-brands");
var singleProducts = document.querySelector(".location-products");
var singleAssociations = document.querySelector(".location-associations");
var singleLanguages = document.querySelector(".location-languages");

const requestLocations = new Request('single.json', {
    headers: new Headers({
        'Key': 'ieurtjkosakwehua1457821244amsnashjad',
        'Access-Control-Allow-Origin':'*'
    })
});
fetch(requestLocations, { mode: 'no-cors' })
    .then(data => data.json())
    .then(response => {
        let data = response.records;

        var singlelisting = '';
        var phones = '';
        var intervals = '';
        var categories = '';
        var emails = '';
        var hours = '';
        var intervals = '';
        var images = '';
        var videos = '';
        var urls = '';
        var keywords = '';
        var lists = '';
        var specialities = '';
        var brands = '';
        var products = '';
        var services = '';
        var associations = '';
        var languages = '';

        data.forEach(location => {
            singlelisting+= `
            <div class="single-location-wrapper">
                <h2 class="location-name">${location.name}</h2>
                <div class="description">${location.description}</div>
                <div class="goeData">
                    <div class="latitude">Latitude: ${location.geoData.displayLatitude}</div>
                    <div class="longitude">Longitude: ${location.geoData.displayLongitude}</div>
                </div>
                <div class="special-offer">
                    <div class="message">Special Offer: ${location.specialOffer.message}</div>
                    <div class="url"><a href="${location.specialOffer.url}">View Offer</a></div>
                </div>
                <div class="social-links">
                    <div class="twitter"><a href="${location.twitterHandle}">Twitter</a></div>
                    <div class="facebook"><a href="${location.facebookPageUrl}">Facebook</a></div>
                </div>
                <div class="yext"><div class="attribution"><img src="${location.attribution.image.url}" height="${location.attribution.image.height}" width="${location.attribution.image.width}" alt="${location.attribution.image.description}"></div></div>
                <div class="closed"><p>Closed: ${location.closed}</p></div>
                <div class="yearEstablished"><p>Year Established: ${location.yearEstablished}</p></div>
            </div>
            `;
        });
        singleLocations.innerHTML = singlelisting;

        // Phones
        data.forEach(data => {
            data.phones.forEach(phone => {
                phones+=`
                    <div class="number">
                        <div class="phone-number">Phone Number: ${phone.number.countryCode}-${phone.number.number}</div>
                        <div class="phone-description">Description: ${phone.description}</div>
                        <div class="phone-type">Type: ${phone.type}</div>
                    </div>
                `;
            });
        });
        singlePhones.innerHTML = phones;

        // Categories
        data.forEach(data => {
            data.categories.forEach(category => {
                categories+=`
                    <div class="category">ID: ${category.id} - ${category.name}</div>
                `;
            });
        });
        singleCategories.innerHTML = categories;

        // Emails
        data.forEach(data => {
            data.emails.forEach(email => {
                emails+=`
                    <div class="email">
                        <div class="email-address"><a href="mailto:${email.address}">${email.address}</a></div>
                        <div class="email-description">${email.description}</div>
                    </div>
                `;
            });
        });
        singleEmails.innerHTML = emails;

        // Hours
        // data.forEach(data => {
        //     data.hours.forEach(hour => {
        //         hours+=`
        //             <div class="hours">
        //                 <div class="day">${hour.day}</div>
        //                 <div class="intervals">
        //                     ${
        //                         hour.intervals.forEach(interval => {
        //                             intervals+=`
        //                                 <div class="start">${interval.starts}</div>
        //                                 <div class="end">${interval.ends}</div>
        //                             `
        //                         })
        //                     }                            
        //                 </div>
        //             </div>
        //         `;
        //     });
        // });
        // singleHours.innerHTML = hours;

    // Images
    data.forEach(data => {
        data.images.forEach(image => {
            images+=`
                <div class="images">
                    <div class="image-url"><img src="${image.url}" alt="${image.type}" height="${image.height}" width="${image.width}"></div>
                </div>
            `;
        });
    });
    singleImages.innerHTML = images;

    // Videos
    data.forEach(data => {
        data.videos.forEach(video => {
            videos+=`
                <div class="videos">
                    <div class="video-url"><iframe width="560" height="315" src="https://www.youtube.com/embed/${video.url}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                </div>
            `;
        });
    });
    singleVideos.innerHTML = videos;

    // Urls
    data.forEach(data => {
        data.urls.forEach(url => {
            urls+=`
                <div class="url">
                    <div class="displayUrl">${url.displayUrl}</div>
                    <div class="displayUrl">${url.type}</div>
                </div>
            `;
        });
    });
    singleVideos.innerHTML = urls;

    // Keywords
    data.forEach(data => {
        data.keywords.forEach(keyword => {
            keywords+=`
                <div class="keywords">${keyword}</div>
            `;
        });
    });
    singleKeywords.innerHTML = keywords;

    // Lists
    data.forEach(data => {
        data.lists.forEach(list => {
            lists+=`
                <div class="lists">
                    <div class="list-name">${list.name}</div>
                    <div class="list-description">${list.description}</div>
                    <div class="list-type">${list.type}</div>
                </div>
            `;
        });
    });
    singleLists.innerHTML = lists;
});