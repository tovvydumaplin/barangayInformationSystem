// Initialize map centered at San Pedro, Laguna
var map = L.map("map").setView([14.3589, 121.0557], 13);

// Add OpenStreetMap tiles
L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
  attribution: "© OpenStreetMap contributors",
}).addTo(map);

var markers = []; // Store markers

// Load stored locations from localStorage
function loadLocations() {
  var savedLocations =
    JSON.parse(localStorage.getItem("familyLocations")) || [];

  savedLocations.forEach(function (data) {
    var marker = L.marker([data.lat, data.lng])
      .addTo(map)
      .bindPopup(
        `<b>${data.familyName}</b><br>Lat: ${data.lat.toFixed(
          5
        )}, Lng: ${data.lng.toFixed(5)}`
      );

    markers.push(marker);
  });
}

// Handle map click
map.on("click", function (e) {
  var lat = e.latlng.lat;
  var lng = e.latlng.lng;

  var familyName = prompt("Enter Family Name:"); // Ask for family name

  if (!familyName) return; // Stop if canceled or empty

  // Save data to localStorage
  var savedLocations =
    JSON.parse(localStorage.getItem("familyLocations")) || [];
  savedLocations.push({ familyName, lat, lng });
  localStorage.setItem("familyLocations", JSON.stringify(savedLocations));

  // Add marker to the map
  var marker = L.marker([lat, lng])
    .addTo(map)
    .bindPopup(
      `<b>${familyName}</b><br>Lat: ${lat.toFixed(5)}, Lng: ${lng.toFixed(5)}`
    )
    .openPopup();

  markers.push(marker);
});

// Load locations when the page loads
loadLocations();
