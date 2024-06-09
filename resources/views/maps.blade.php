<!DOCTYPE html>
<html>
<head>
    <title>Google Maps with Places Autocomplete</title>
    <style>
        #map {
            height: 500px;
            width: 100%;
        }

        #place-autocomplete-card {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            font-family: Roboto;
            margin: 10px;
            padding: 5px;
        }

        #place-autocomplete-input {
            width: 100%;
            padding: 10px;
        }
    </style>
</head>
<body>
<h1>Google Maps with Places Autocomplete</h1>

<!-- Container for the Autocomplete widget -->
<div id="place-autocomplete-card">
    <input id="place-autocomplete-input" type="text" placeholder="Enter a place">
</div>

<!-- Container for the map -->
<div id="map"></div>

<!-- Google Maps API inline loader script -->
<script>
    (g => {
        var h, a, k, p = "The Google Maps JavaScript API", c = "google", l = "importLibrary", q = "__ib__",
            m = document, b = window;
        b = b[c] || (b[c] = {});
        var d = b.maps || (b.maps = {}), r = new Set, e = new URLSearchParams,
            u = () => h || (h = new Promise(async (f, n) => {
                await (a = m.createElement("script"));
                e.set("libraries", [...r] + "");
                for (k in g) e.set(k.replace(/[A-Z]/g, t => "_" + t[0].toLowerCase()), g[k]);
                e.set("callback", c + ".maps." + q);
                a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
                d[q] = f;
                a.onerror = () => h = n(Error(p + " could not load."));
                a.nonce = m.querySelector("script[nonce]")?.nonce || "";
                m.head.append(a);
            }));
        d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) && u().then(() => d[l](f, ...n))
    })({
        key: "AIzaSyAl-NMidw37nGHpKPXadaxnSZQG3_qI2YA",
        v: "weekly",
        libraries: ["places"],
        // Use the 'v' parameter to indicate the version to use (weekly, beta, alpha, etc.).
        // Add other bootstrap parameters as needed, using camel case.
    });
</script>

<!-- Your custom script to initialize the map and Autocomplete widget -->
<script>
    async function initialize() {
        const {Map} = await google.maps.importLibrary("maps");
        const {Autocomplete} = await google.maps.importLibrary("places");

        // Initialize the map
        const map = new Map(document.getElementById("map"), {
            center: {lat: 35.6764, lng: 139.6500},
            zoom: 6,
        });

        // Initialize the Autocomplete widget
        const input = document.getElementById("place-autocomplete-input");
        const autocomplete = new Autocomplete(input);

        // Add the card container to the map as a custom control
        const card = document.getElementById("place-autocomplete-card");
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(card);

        // Bind the Autocomplete widget to the map's bounds
        autocomplete.bindTo('bounds', map);

        // Listen for place changes and handle them
        autocomplete.addListener('place_changed', () => {
            const place = autocomplete.getPlace();
            if (!place.geometry) {
                console.log("No details available for input: '" + place.name + "'");
                return;
            }

            // If the place has a geometry, then present it on a map
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);  // Why 17? Because it looks good.
            }
        });
    }

    // Initialize the map and Places Autocomplete when the page loads
    window.onload = initialize;
</script>
</body>
</html>
