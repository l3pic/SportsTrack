function togglesidenav(element) {
    $('#sidenav').toggleClass('open');
    if ($('#sidenav').hasClass('open')) {
        $("html").css("--sidenav-width", '250px');
        $(element).replaceWith('<svg xmlns="http://www.w3.org/2000/svg" height="1.2em" viewBox="0 0 384 512" style="fill:#ffffff" class="sidenav-toggle" onclick="togglesidenav(this);"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>')
    } else {
        $("html").css("--sidenav-width", '0px');
        $(element).replaceWith('<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512" style="fill:#ffffff" class="sidenav-toggle" onClick="togglesidenav(this);"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg>')
    }
}

function addFavorite(lat, lon, name) {
    $.ajax({
        url: urlroot + '/ajax/favorite.php',
        type: 'POST',
        data: {
            op: 'add',
            lat: lat,
            lon: lon,
            name: name
        },
        success: function (data) {
            jsonData = JSON.parse(data);
            if(jsonData.success = true) window.location.reload();
        }
    });
}

function removeFavorite(id) {
    $.ajax({
        url: urlroot + '/ajax/favorite.php',
        type: 'POST',
        data: {
            op: 'remove',
            id: id
        },
        success: function (data) {
            jsonData = JSON.parse(data);
            if(jsonData.success = true) window.location.reload();
        }
    });
}

if (locationIsset == 0) {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;

            console.log("Latitude: " + latitude + ", Longitude: " + longitude);
            //ajax set location wit setSessionVar
            $.ajax({
                url: urlroot + '/ajax/setSessionVar.php',
                type: 'POST',
                data: {
                    varName: 'location',
                    varValue: {
                        lat: latitude,
                        lon: longitude
                    }
                },
                success: function (data) {
                    window.location.reload();
                }
            });
        });
    } else {
        console.log("Geolocation wird nicht unterstützt.");
    }
}
$(document).ready(function () {
    const currentDate = new Date();
    const currentHour = currentDate.getHours();

// Zeitintervall
    const dayStartHour = 7;
    const dayEndHour = 18;

// Hintergund nach UHrzeit setzen
    if (currentHour >= dayStartHour && currentHour < dayEndHour) {
        document.body.style.backgroundImage = 'url("https://picsum.photos/id/132/2560/1440")'; // Tag
    } else {
        document.body.style.backgroundImage = 'url("https://picsum.photos/id/122/2560/1440")'; //Nacht
    }
});