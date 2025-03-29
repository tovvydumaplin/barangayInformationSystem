$(document).ready(function () {
  // ~~~~~~~~~~~~~~~~~~~~~~~~ ⚡ Global Declarations ⚡ ~~~~~~~~~~~~~~~~~~~~~~~~ //
  let markers = []; // Store markers USED IN (1)
  let isEditMode = false;
  let isHiddenMarker = false;
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
    const houseType = $("[name='type']").val();
    const latitude = $("#latInput").val();
    const longitude = $("#lngInput").val();

    if (!houseNumber) {
      alert("Please enter a house number.");
      return;
    }

    $.ajax({
      url: "create-pin",
      type: "POST",
      data: {
        house_number: houseNumber,
        house_street: houseStreet,
        type: houseType,
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
  const houseIcons = {
    residential: L.icon({
      iconUrl: "https://cdn-icons-png.flaticon.com/512/684/684908.png", // Residential House Icon
      iconSize: [32, 32],
      iconAnchor: [16, 32],
      popupAnchor: [0, -32],
    }),
    government: L.icon({
      iconUrl: "https://cdn-icons-png.flaticon.com/512/1838/1838419.png", // Government Building Icon
      iconSize: [32, 32],
      iconAnchor: [16, 32],
      popupAnchor: [0, -32],
    }),
    commercial: L.icon({
      iconUrl: "https://cdn-icons-png.flaticon.com/512/10845/10845690.png", // Commercial
      iconSize: [32, 32],
      iconAnchor: [16, 32],
      popupAnchor: [0, -32],
    }),
    healthcare: L.icon({
      iconUrl: "https://cdn-icons-png.flaticon.com/512/2994/2994480.png", // health care House Icon
      iconSize: [32, 32],
      iconAnchor: [16, 32],
      popupAnchor: [0, -32],
    }),
    education: L.icon({
      iconUrl: "https://cdn-icons-png.flaticon.com/512/8074/8074788.png", // education
      iconSize: [32, 32],
      iconAnchor: [16, 32],
      popupAnchor: [0, -32],
    }),
    transport: L.icon({
      iconUrl: "https://cdn-icons-png.flaticon.com/512/14364/14364405.png", // transport House Icon
      iconSize: [32, 32],
      iconAnchor: [16, 32],
      popupAnchor: [0, -32],
    }),
  };

  const addMarker = function (
    lat,
    lng,
    type,
    houseNumber,
    houseStreet,
    residents
  ) {
    let newLat = lat;
    let newLng = lng;

    console.log("House Type:", type); // Debugging

    const iconType = type ? type.toLowerCase() : "default";

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

    const marker = L.marker([lat, lng], {
      draggable: isEditMode,
      icon: houseIcons[iconType] || houseIcons.default,
    })
      .addTo(map)
      .bindPopup(
        `<div class="custom-popup">
            <div class="popup__header">
              <div class="header__container__text">
                <div class="popup__header__text">
                  <p class="house__number">${houseNumber}</p>
                </div>
                <p class="popup__address" title="${houseStreet}">${houseStreet}</p>
              </div>
              <p class="pin__type">${type || "Unknown Type"}</p>
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

        let oldHouseNumber = houseNumber;

        alert(
          `House Number: ${houseNumber}\n\n` +
            `Previous Location:\nLatitude: ${lat.toFixed(
              5
            )}\nLongitude: ${lng.toFixed(5)}\n\n` +
            `New Location:\nLatitude: ${newLat.toFixed(
              5
            )}\nLongitude: ${newLng.toFixed(5)}`
        );

        let newHouseNumber = prompt("Enter new house number:", houseNumber);

        if (newHouseNumber === null || newHouseNumber.trim() === "") {
          marker.setLatLng([lat, lng]);
          return;
        }

        let popupContent = marker.getPopup().getContent();
        let tempDiv = document.createElement("div");
        tempDiv.innerHTML = popupContent;

        tempDiv.querySelector(".popup-lat").textContent = newLat.toFixed(5);
        tempDiv.querySelector(".popup-lng").textContent = newLng.toFixed(5);
        tempDiv.querySelector(".house__number").textContent = newHouseNumber;

        let saveButton = tempDiv.querySelector(".save-marker");
        saveButton.style.display = "block";
        saveButton.setAttribute("data-house", newHouseNumber);

        marker.setPopupContent(tempDiv.innerHTML);

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
            house.type,
            house.house_no,
            house.house_street,
            house.residents || []
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

  // Function to search for a house number
  function searchHouseNumber(houseNumber) {
    let found = false;

    markers.forEach((marker) => {
      const popupContent = marker.getPopup().getContent();
      if (
        popupContent.includes(`<p class="house__number">${houseNumber}</p>`)
      ) {
        found = true;

        // Open popup and pan to marker
        marker.openPopup();
        map.setView(marker.getLatLng(), 17);
      }
    });

    if (!found) {
      alert("House number not found!");
    }
  }

  // Event listener for search button
  $("#searchHouseButton").on("click", function () {
    const houseNumber = $("#searchHouseInput").val().trim();
    if (houseNumber) {
      searchHouseNumber(houseNumber);
    } else {
      alert("Please enter a house number.");
    }
  });

  function hideMarkers() {
    markers.forEach((marker) => marker.setOpacity(0));
    isHiddenMarker = true;
  }

  function showMarkers() {
    markers.forEach((marker) => marker.setOpacity(1));
    isHiddenMarker = false;
  }

  // ~~~~~~~~~~~~~~~~~~~~~~~~ ⚡ Event Listeners ⚡ ~~~~~~~~~~~~~~~~~~~~~~~~ //
  $(".btn__edit__mode").on("click", function () {
    if (isEditMode) {
      deactivateEditMode();
      $(".btn__edit__mode").removeClass("selected");
      $(this).html(`
        <div class="icon__bs">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
          </svg>
        </div>
         Edit Mode
      `);
    } else {
      activateEditMode();
      $(".btn__edit__mode").addClass("selected");
      $(this).html(`
        <div class="icon__bs">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
          </svg>
        </div>
        View Mode
      `);
    }
  });

  $(".btn__hide__markers").on("click", function () {
    if (!isHiddenMarker) {
      hideMarkers();
      $(".btn__hide__markers").addClass("selected");
      $(this).html(`
        <div class="icon__bs">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
          </svg>
        </div>
         Show Markers
      `);
    } else {
      showMarkers();
      $(".btn__hide__markers").removeClass("selected");
      $(this).html(`
        <div class="icon__bs">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
            <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7 7 0 0 0-2.79.588l.77.771A6 6 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755q-.247.248-.517.486z"/>
            <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829"/>
            <path d="M3.35 5.47q-.27.24-.518.487A13 13 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7 7 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12z"/>
          </svg>
        </div>
         Hide Markers
      `);
    }
  });

  $(document).on("click", ".delete__resident", function () {
    let residentId = $(this).data("resident-id");
    let residentRow = $(this).closest(".popup__row"); // Target the row div

    if (!confirm("Are you sure you want to remove this resident?")) {
      return;
    }

    $.ajax({
      url: "remove-resident-in-house",
      type: "POST",
      data: { resident_id: residentId, house_no: 0 },
      dataType: "json",
      success: function (response) {
        if (response.success) {
          alert("Resident removed successfully!");

          residentRow.remove();

          let membersContainer = $(".members__container");
          if (membersContainer.find(".popup__row").length === 0) {
            membersContainer.html(
              "<p class='popup__text'>No residents found.</p>"
            );
          }

          let currentPopup = $(".leaflet-popup-content").parent();
          if (currentPopup.length > 0) {
            let newContent = $(".custom-popup").html();
            let marker = markers.find((m) => m.isPopupOpen());
            if (marker) {
              marker.setPopupContent(
                `<div class="custom-popup">${newContent}</div>`
              );
            }
          }
        } else {
          alert("Failed to remove resident.");
        }
      },
      error: function () {
        alert("An error occurred. Please try again.");
      },
    });
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

  const searchHouseViaNumber = function () {
    const houseNumber = $("#searchHouseInput").val().trim();
    if (houseNumber) {
      searchHouseNumber(houseNumber);
    } else {
      alert("Please enter a house number.");
    }
  };

  $("#searchHouseButton").on("click", function () {
    searchHouseViaNumber();
  });

  $(document).on("keydown", function (event) {
    if (event.key === "Enter") {
      searchHouseViaNumber();
    }
  });

  // ~~~~~~~~~~~~~~~~~~~~~~~~ ⚡ ON LOAD ⚡ ~~~~~~~~~~~~~~~~~~~~~~~~ //
  loadHouseMarkers();
});
