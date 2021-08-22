let map;

function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
        zoom: 3,
        center: new google.maps.LatLng(0, 0),
        mapTypeId: "terrain",
    });
    const script = document.createElement("script");
    script.src = "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/all_day.geojsonp";
    document.getElementsByTagName("head")[0].appendChild(script);
}

// Loop through the results array and place a marker for each
// Set of coordinates
const eqfeed_callback = function (results) {
  for (let i = 0; i < results.features.length; i++) {
        const coords = results.features[i].geometry.coordinates;
        const latLng = new google.maps.LatLng(coords[1], coords[0]);
        const title = results.features[i].properties.title;
        const depth = coords[2].toFixed(1);
        const time = new Date(results.features[i].properties.time).toUTCString();

        // Changing coordinates to East, West, North & South
        if(coords[1] < 0)
        {
        latitude = Math.abs(coords[1]).toFixed(3) + '&deg;S';
        }
        else
        {
            latitude = coords[1].toFixed(3) + '&deg;N';
        }

        if(coords[0] < 0)
        {
        longitude = Math.abs(coords[0]).toFixed(3) + '&deg;W';
        }
        else
        {
            longitude = coords[0].toFixed(3) + '&deg;E';
        }

        // Callout contents
        const contentString =
        '<div id="content">' +
        '<div id="siteNotice">' +
        "</div>" +
        '<h4 id="firstHeading" class="firstHeading">' + title + '</h4>' +
        '<div id="bodyContent">' +
        '<p><strong> Location:</strong> ' + latitude + ' ' + longitude + '</p>' +
        '<p><strong> Depth: </strong>' + depth + ' Km' + '</p>' +
        '<p><strong> Date and Time: </strong>' + time +  '</p>' +
        "</div>" +
        "</div>";

        const infowindow = new google.maps.InfoWindow({
            content: contentString,
        });

        const marker = new google.maps.Marker({
            position: latLng,
            map,
            title: results.features[i].properties.title,
        });

        // Click event for callout
        marker.addListener("click", () => {
            infowindow.open({
            anchor: marker,
            map,
            shouldFocus: false,
            });
        });

    }
};
