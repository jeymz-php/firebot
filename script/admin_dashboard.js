// FOR THE CARDS POTANGENA
function loadDashboardCards() {
  fetch('../controls/get_dashboard_cards.php')
    .then(response => response.json())
    .then(data => {
      document.getElementById('robotsDeployed').textContent = data.robotsDeployed;
      document.getElementById('totalUsers').textContent = data.totalUsers;
      document.getElementById('fireIncidents').textContent = data.fireIncidents;
      document.getElementById('unreadMessages').textContent = data.unreadMessages;
    })
    .catch(error => console.error('Error loading card stats:', error));
}

loadDashboardCards();
setInterval(loadDashboardCards, 10000); 



// FOR ROBOT GPS (MAP)
var map = L.map('map').setView([14.5995, 120.9842], 12);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '© OpenStreetMap contributors'
}).addTo(map);

let markers = {};

const getMarkerColor = (status) => {
  return status === 'Active'
    ? 'green'
    : status === 'Idle'
    ? 'orange'
    : 'gray';
};

function smoothMove(marker, newLatLng, duration = 1000) {
  const startLatLng = marker.getLatLng();
  const latDiff = newLatLng.lat - startLatLng.lat;
  const lngDiff = newLatLng.lng - startLatLng.lng;
  const steps = 30;
  let step = 0;

  const interval = setInterval(() => {
    step++;
    const lat = startLatLng.lat + (latDiff * step) / steps;
    const lng = startLatLng.lng + (lngDiff * step) / steps;
    marker.setLatLng([lat, lng]);
    if (step >= steps) clearInterval(interval);
  }, duration / steps);
}

function loadRobots() {
  const loader = document.getElementById('mapLoader');
  if (loader) loader.classList.remove('hidden');

  fetch('../controls/get_robots.php')
    .then(response => response.json())
    .then(data => {
      if (loader) loader.classList.add('hidden');
      data.forEach(robot => {
        const id = robot.id;
        const latLng = L.latLng(robot.latitude, robot.longitude);
        const color = getMarkerColor(robot.status);

        if (!markers[id]) {
          const icon = L.divIcon({
            className: 'custom-icon',
            html: `<i class="fa-solid fa-robot" style="color:${color};font-size:20px;"></i>`,
            iconSize: [20, 20],
          });

          const marker = L.marker(latLng, { icon }).addTo(map);
          marker.bindPopup(`
            <b>${robot.name}</b><br>
            Status: ${robot.status}<br>
            Lat: ${robot.latitude}<br>
            Lng: ${robot.longitude}
          `);
          markers[id] = { marker, status: robot.status };
        } else {
          const existing = markers[id];
          smoothMove(existing.marker, latLng);
          if (existing.status !== robot.status) {
            existing.status = robot.status;
            const newIcon = L.divIcon({
              className: 'custom-icon',
              html: `<i class="fa-solid fa-robot" style="color:${color};font-size:20px;"></i>`,
              iconSize: [20, 20],
            });
            existing.marker.setIcon(newIcon);
          }
          existing.marker.setPopupContent(`
            <b>${robot.name}</b><br>
            Status: ${robot.status}<br>
            Lat: ${robot.latitude}<br>
            Lng: ${robot.longitude}
          `);
        }
      });
    })
    .catch(error => {
      console.error('Error loading robot data:', error);
      if (loader) loader.textContent = 'Failed to load map data.';
    });
}

loadRobots();
setInterval(loadRobots, 10000);

function loadFireStations() {
    fetch('../api/get_fire_stations.php')
        .then(response => response.json())
        .then(stations => {
            stations.forEach(station => {
                // Create a Red Building Icon for Fire Stations
                const stationIcon = L.divIcon({
                    className: 'station-icon',
                    html: `<i class="fa-solid fa-house-fire" style="color:#d9534f;font-size:22px;text-shadow: 0 0 3px #fff;"></i>`,
                    iconSize: [25, 25],
                });

                const stationMarker = L.marker([station.latitude, station.longitude], { icon: stationIcon }).addTo(map);
                
                stationMarker.bindPopup(`
                    <div style="text-align:center;">
                        <b style="color:#d9534f;"><i class="fa-solid fa-fire-extinguisher"></i> ${station.station_name}</b><br>
                        <small>${station.address}</small><br>
                        <b>Contact:</b> ${station.contact_number}
                    </div>
                `);
            });
        })
        .catch(error => console.error('Error loading fire stations:', error));
}


// FOR ROBOT LOGS
function loadRobotLogs() {
  const loader = document.getElementById('logLoader');
  if (loader) loader.classList.remove('hidden');

  fetch('../controls/get_robot_logs.php')
    .then(response => response.json())
    .then(data => {
      if (loader) loader.classList.add('hidden');
      const logContainer = document.getElementById('robotLogs');
      logContainer.innerHTML = '';

      data.forEach(log => {
        const item = document.createElement('div');
        item.className = 'log-item';
        item.innerHTML = `
          <div class="log-info">
            <h4>${log.robot_name}</h4>
            <p>${log.message}</p>
            <div class="log-time">
              <i class="fa-regular fa-clock"></i>
              ${new Date(log.timestamp).toLocaleString()}
            </div>
          </div>
          <span class="log-status ${log.status.toLowerCase()}">${log.status}</span>
        `;
        logContainer.appendChild(item);
      });
    })
    .catch(error => {
      console.error('Error loading logs:', error);
      if (loader) loader.textContent = 'Failed to load logs.';
    });
}

loadRobots();
setInterval(loadRobots, 10000);

// ADD THIS LINE HERE TO TRIGGER THE SEARCH
loadFireStations();
