let map;
let markers = [];
let currentColor = "#000000";
let currentDescription = "";
let currentDatetime = "";

function initMap() {
    // Koordinat yang diberikan (1.11° N, 104.0956° E)
    const initialCoordinate = [1.11, 104.0956];

    // Batas geografis maksimum untuk mengunci peta
    const maxBounds = L.latLngBounds([1.1108333, 104.0952778], [1.1097222, 104.0961111]);

    // Inisialisasi peta dan atur batas geografis maksimum, minZoom, dan maxZoom
    map = L.map('map', {
        minZoom: 5,
        maxZoom: 50,
        maxBounds: maxBounds,
    }).setView(initialCoordinate, 18);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

    map.on('click', onMapClick);
    // L.control.scale().addTo(map);
    L.control.zoom({ position: 'topright' }).addTo(map);

    // Tambahkan plugin pencarian
    var searchControl = new L.Control.Search({
        position: 'topleft',
        layer: L.layerGroup().addTo(map),
        propertyName: 'name',
        marker: false,
        moveToLocation: function(latlng, title, map) {
            map.setView(latlng, 17);
        }
    });

    map.addControl(searchControl);

    displayMarkersFromData();
}

function onMapClick(e) {
    const latLng = e.latlng;
    const intensity = Math.random();
    const color = currentColor || getColorBasedOnIntensity(intensity);

    document.getElementById('marker_long').value = latLng.lng;
    document.getElementById('marker_lat').value = latLng.lat;
    document.getElementById('marker_color').value = color;
    document.getElementById('marker_desc').value = currentDescription;
    document.getElementById('marker_date').value = currentDatetime;
    console.log(latLng, color, currentDescription, currentDatetime);

    const marker = L.circleMarker(latLng, {
        color: 'black',
        fillColor: color,
        fillOpacity: 0.7,
        radius: 10,
    }).addTo(map);

    marker.bindPopup(createPopupContent(marker));

    markers.push(marker);
}

function getColorBasedOnIntensity(intensity) {
    if (intensity > 0.7) return 'red';
    else if (intensity > 0.4) return 'yellow';
    else return 'green';
}

function createPopupContent(marker, description, datetime) {
    return `
        <h3>${marker.getLatLng().toString()}</h3>
        <p>Description: ${description}</p>
        <p>Date and Time: ${datetime}</p>
    `;
}

function updateColor() {
    currentColor = document.getElementById("colorPicker").value;
}

function updateDescription() {
    currentDescription = document.getElementById("descriptionInput").value;
}

function updateDatetime() {
    currentDatetime = document.getElementById("datetimeInput").value;
}

function deleteSelectedMarker() {
    const marker = markers.pop();
    if (marker) {
        map.removeLayer(marker);
    }
}

function displayMarkersFromData() {
    markersData.forEach(markerData => {
        const latLng = L.latLng(markerData.latitude, markerData.longitude);
        const color = markerData.mark_color;
        const description = markerData.incident_desc;
        const datetime = markerData.date_time;

        const marker = L.circleMarker(latLng, {
            color: 'black',
            fillColor: color,
            fillOpacity: 0.7,
            radius: 10,
        }).addTo(map);

        marker.bindPopup(createPopupContent(marker, description, datetime));

        markers.push(marker);
    });
}

document.addEventListener('DOMContentLoaded', initMap);