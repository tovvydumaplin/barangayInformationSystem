$(document).ready(function () {
  // ~~~~~~~~~~~~~~~~~~~~~~~~ ⚡ Global Declarations ⚡ ~~~~~~~~~~~~~~~~~~~~~~~~ //
  let markers = []; // Store markers USED IN (1)
  let isEditMode = false;
  // ~~~~~~~~~~~~~~~~~~~~~~~~ ⚡ Map Initialization ⚡ ~~~~~~~~~~~~~~~~~~~~~~~~ //

  // Initialize map centered at San Pedro, Laguna
  const map = L.map("map").setView([14.3589, 121.0557], 13);

  // Add OpenStreetMap tiles
  L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution: "© OpenStreetMap contributors",
  }).addTo(map);
  // ~~~~~~~~~~~~~~~~~~~~~~~~ ⚡ Functions ⚡ ~~~~~~~~~~~~~~~~~~~~~~~~ //

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

  const saveHouseNumber = function () {
    const houseNumber = $("#houseNumberInput").val().trim();
    const houseStreet = $("[name='house_street']").val();
    const latitude = $("#latInput").val();
    const longitude = $("#lngInput").val();

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
  };

  const activateEditMode = function () {
    isEditMode = true;
    markers.forEach((marker) => marker.dragging.enable()); // Enable dragging
  };
  const deactivateEditMode = function () {
    isEditMode = false;
    markers.forEach((marker) => marker.dragging.disable()); // Disable dragging
  };

  let autoSaveEnabled = true; // Toggle for auto-save mode

  // Function to add a marker (Used in loadHouseMarkers)
  const addMarker = function (lat, lng, houseNumber, houseStreet, residents) {
    let newLat = lat;
    let newLng = lng;

    let residentsHTML = residents
      .map((resident) => {
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
            <i class="delete__resident fa-solid fa-trash" data-resident-id="${
              resident.resident_id
            }"></i>
          </div>`;
      })
      .join("");

    const marker = L.marker([lat, lng], { draggable: isEditMode })
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
                <p class="popup__text"><span>Latitude:</span> <span class="popup-lat">${lat.toFixed(
                  5
                )}</span></p>
                <p class="popup__text"><span>Longitude:</span> <span class="popup-lng">${lng.toFixed(
                  5
                )}</span></p>
              </div>
              <div class="members__container">
                <p class="popup__heading">Family Members</p>
                ${
                  residentsHTML ||
                  "<p class='popup__text'>No residents found.</p>"
                }
              </div>
            </div>
            <button class="add-marker" data-lat="${lat}" data-lng="${lng}">Add Resident</button>
            <button class="save-marker" style="display:none" data-house="${houseNumber}">Save Location</button>
        </div>`,
        { closeOnClick: false }
      )
      .on("dragend", function (event) {
        if (!isEditMode) return;

        newLat = event.target.getLatLng().lat;
        newLng = event.target.getLatLng().lng;

        // Save the original house number before updating it
        let oldHouseNumber = houseNumber;

        // Show an alert with previous and new coordinates
        alert(
          `House Number: ${houseNumber}\n\n` +
            `Previous Location:\nLatitude: ${lat.toFixed(
              5
            )}\nLongitude: ${lng.toFixed(5)}\n\n` +
            `New Location:\nLatitude: ${newLat.toFixed(
              5
            )}\nLongitude: ${newLng.toFixed(5)}`
        );

        // Ask user for a new house number
        let newHouseNumber = prompt("Enter new house number:", houseNumber);

        if (newHouseNumber === null || newHouseNumber.trim() === "") {
          // If user cancels or leaves blank, reset marker position
          marker.setLatLng([lat, lng]);
          return;
        }

        // Get the current popup container
        let popupContent = marker.getPopup().getContent();
        let tempDiv = document.createElement("div");
        tempDiv.innerHTML = popupContent;

        // Update elements inside the popup
        tempDiv.querySelector(".popup-lat").textContent = newLat.toFixed(5);
        tempDiv.querySelector(".popup-lng").textContent = newLng.toFixed(5);
        tempDiv.querySelector(".house__number").textContent = newHouseNumber;

        // Show the save button and update its data attribute
        let saveButton = tempDiv.querySelector(".save-marker");
        saveButton.style.display = "block";
        saveButton.setAttribute("data-house", newHouseNumber);

        // Update the popup with the modified content
        marker.setPopupContent(tempDiv.innerHTML);

        // Auto-save if enabled
        if (autoSaveEnabled) {
          updateMarkerLocation(oldHouseNumber, newHouseNumber, newLat, newLng);
        }
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

  const updateMarkerLocation = function (
    oldHouseNumber,
    newHouseNumber,
    newLat,
    newLng
  ) {
    $.ajax({
      url: "update-house-location",
      type: "POST",
      data: {
        old_house_number: oldHouseNumber, // Send old house number
        house_number: newHouseNumber, // Send new house number
        latitude: newLat,
        longitude: newLng,
      },
      dataType: "json",
      success: function (response) {
        if (response.success) {
          alert("House number and location updated successfully!");
        } else {
          alert("Failed to update house number and location.");
        }
      },
      error: function () {
        alert("Error updating house details.");
      },
    });
  };

  $(document).on("click", ".save-marker", function () {
    const houseNumber = $(this).data("house");
    const marker = markers.find((m) =>
      m.getPopup().getContent().includes(houseNumber)
    );

    if (!marker) return;

    const newLat = marker.getLatLng().lat;
    const newLng = marker.getLatLng().lng;

    updateMarkerLocation(houseNumber, newLat, newLng);

    // Hide save button after saving
    $(this).hide();
  });

  // ~~~~~~~~~~~~~~~~~~~~~~~~ ⚡ Event Listeners ⚡ ~~~~~~~~~~~~~~~~~~~~~~~~ //
  $(".btn__edit__mode").on("click", function () {
    if (isEditMode) {
      deactivateEditMode();
      $(this).text("Switch to Edit Mode");
    } else {
      activateEditMode();
      $(this).text("Switch to View Mode");
    }
  });

  $("#saveHouseNumber").on("click", function () {
    saveHouseNumber();
  });

  // Handle map click
  map.on("click", function (e) {
    if (!isEditMode) return;
    const lat = e.latlng.lat;
    const lng = e.latlng.lng;

    $("#latInput").val(lat);
    $("#lngInput").val(lng);
    $("#familyModal").show();
  });

  // Close modal
  $("#closeModal").on("click", function () {
    $("#familyModal").hide();
  });
  // ~~~~~~~~~~~~~~~~~~~~~~~~ ⚡ ON LOAD ⚡ ~~~~~~~~~~~~~~~~~~~~~~~~ //
  loadHouseMarkers();
});
