$(document).ready(function () {
  // Initialize map centered at San Pedro, Laguna
  const map = L.map("map").setView([14.3589, 121.0557], 13);

  // Add OpenStreetMap tiles
  L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution: "© OpenStreetMap contributors",
  }).addTo(map);

  let markers = []; // Store markers

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
    const houseStreet = $("[name='house_street']").val();
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
        house_street: houseStreet,
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

  // Function to add a marker THIS FUNCTIUON IS USED ON LOADHOUSEMARKERS
  const addMarker = function (lat, lng, houseNumber, houseStreet, residents) {
    if (
      markers.some(
        (m) => m.getLatLng().lat === lat && m.getLatLng().lng === lng
      )
    ) {
      alert("A marker already exists at this location.");
      return;
    }

    // 🔹 Log the house and residents to verify data
    console.log(
      `Adding marker for House No: ${houseNumber}, Street: ${houseStreet}`
    );
    console.log("Residents:", residents);

    let residentsHTML = residents
      .map((resident) => {
        console.log(
          `Resident: ${resident.fullname}, Is Head: ${resident.is_family_head}`
        );
        return `
          <div class="popup__row">
            <div class="resident__box">
              <i class="fa-solid fa-user"></i>
              <p class="popup__names pos__rel">${resident.fullname} 
                ${
                  resident.is_family_head == 1
                    ? '<span class="family-head">Head</span>'
                    : ""
                }
              </p>
            </div>
            <i class="delete__resident fa-solid fa-trash"></i>
          </div>`;
      })
      .join("");

    const marker = L.marker([lat, lng])
      .addTo(map)
      .bindPopup(
        `<div class="custom-popup">
            <div class="popup__header">
              <div class="popup__header__text">
                <p class="house__number">${houseNumber}</p>
              </div>
              <p class="popup__text">${houseStreet}</p>
            </div>
            <div class="popup__body">
              <div class="coordinates__container">
                <p class="popup__text"><span>Latitude:</span> ${lat.toFixed(
                  5
                )}</p>
                <p class="popup__text"><span>Longitude:</span> ${lng.toFixed(
                  5
                )}</p>
              </div>
              <div class="members__container">
                <p class="popup__heading">Family Members</p>
                ${
                  residentsHTML ||
                  "<p class='popup__text'>No residents found.</p>"
                }
              </div>
            </div>
            <button class="remove-marker" data-lat="${lat}" data-lng="${lng}">Remove</button>
        </div>`
      )
      .on("popupopen", function () {
        $(".remove-marker").on("click", function () {
          removeMarker(lat, lng);
        });
      });

    markers.push(marker);
  };

  // Load stored house details from DB
  function loadHouseMarkers() {
    markers.forEach((marker) => map.removeLayer(marker));
    markers = [];

    $.ajax({
      url: "get-house-details",
      type: "GET",
      dataType: "json",
      success: function (houses) {
        console.log("Received Houses Data:", houses); // Debugging

        houses.forEach(function (house) {
          addMarker(
            parseFloat(house.latitude),
            parseFloat(house.longitude),
            house.house_no,
            house.house_street,
            house.residents || [] // Pass residents array
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
