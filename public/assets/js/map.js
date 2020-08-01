const mymap = L.map('mapid').setView([-12.702452, 45.123055], 16);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(mymap);

        L.marker([-12.702452, 45.123055]).addTo(mymap)
            .bindPopup("<h3>Bandraboua</h3><address>3, villages de  Bandrabou<br/>97650 Bandraboua</address>");

        let circle = L.circle([-12.702452, 45.123055], {
            color: 'e58714',
            fillColor: '#f03',
            fillOpacity: 0.5,
            radius: 10
        }).addTo(mymap);

        let popup = L.popup();

        function onMapClick(e) {
            popup
                .setLatLng(e.latlng)
                .setContent("You clicked the map at " + e.latlng.toString())
                .openOn(mymap);
        }

        mymap.on('click', onMapClick);