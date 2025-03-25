$(document).ready(function () {
  // Initialize map centered at San Pedro, Laguna
  const map = L.map("map").setView([14.3589, 121.0557], 13);

  // Add OpenStreetMap tiles
  L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution: "© OpenStreetMap contributors",
  }).addTo(map);

  let markers = []; // Store markers

  // Function to add a marker
  const addMarker = function (lat, lng, familyName) {
    // Check if the marker already exists
    if (
      markers.some(
        (m) => m.getLatLng().lat === lat && m.getLatLng().lng === lng
      )
    ) {
      alert("A marker already exists at this location.");
      return;
    }

    const marker = L.marker([lat, lng])
      .addTo(map)
      .bindPopup(
        `<b>${familyName}</b><br>Lat: ${lat.toFixed(5)}, Lng: ${lng.toFixed(
          5
        )}<br>
         <button class="remove-marker" data-lat="${lat}" data-lng="${lng}">Remove</button>`
      )
      .on("popupopen", function () {
        $(".remove-marker").on("click", function () {
          removeMarker(lat, lng);
        });
      });

    markers.push(marker);
  };

  // Remove marker from the map
  const removeMarker = function (lat, lng) {
    markers = markers.filter((marker) => {
      if (marker.getLatLng().lat === lat && marker.getLatLng().lng === lng) {
        map.removeLayer(marker);
        return false;
      }
      return true;
    });
  };

  // Handle map click
  map.on("click", function (e) {
    const lat = e.latlng.lat;
    const lng = e.latlng.lng;

    $("#latInput").val(lat);
    $("#lngInput").val(lng);
    $("#familyModal").show();
  });

  // Submit family name from modal
  $("#saveHouseNumber").on("click", function () {
    const houseNumber = $("#houseNumberInput").val().trim();
    const latitude = $("#latInput").val(); // Keep as string to match DB
    const longitude = $("#lngInput").val(); // Keep as string to match DB

    if (!houseNumber) {
      alert("Please enter a house number.");
      return;
    }

    $.ajax({
      url: "create-pin", // Ensure this matches your route
      type: "POST",
      data: {
        house_number: houseNumber,
        latitude: latitude,
        longitude: longitude,
      },
      dataType: "json",
      success: function (response) {
        if (response.success) {
          alert("Pin saved successfully!");
          $("#familyModal").hide();
          loadHouseMarkers();
        } else {
          alert(response.message || "An error occurred.");
        }
      },
      error: function () {
        alert("Failed to connect to the server.");
      },
    });
  });

  // Close modal
  $("#closeModal").on("click", function () {
    $("#familyModal").hide();
  });

  // Load stored house details from DB
  function loadHouseMarkers() {
    // Remove all existing markers before loading new ones
    markers.forEach((marker) => map.removeLayer(marker));
    markers = []; // Reset the array

    $.ajax({
      url: "get-house-details",
      type: "GET",
      dataType: "json",
      success: function (houses) {
        houses.forEach(function (house) {
          addMarker(
            parseFloat(house.latitude),
            parseFloat(house.longitude),
            house.house_no,
            false
          );
        });
      },
      error: function () {
        console.error("Failed to load house details.");
      },
    });
  }

  // Call function to load saved houses when the page loads
  loadHouseMarkers();
});
