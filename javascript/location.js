async function initMap() {
    const { Map } = await google.maps.importLibrary("maps");
    const { Marker } = await google.maps.importLibrary("marker");

    var center = {
        center: { lat: 10.388297, lng:107.101414},
        zoom: 15
    };

    var map = new Map(document.getElementById('map'), center);

    const addMarker = (props) => {
        const marker = new Marker({
            position: props.position,
            map:map,
        });

        const infoWindow = new google.maps.InfoWindow({
            content: props.content
        });
        marker.addListener("mouseover",() => {
            infoWindow.open(map, marker);
        })
        marker.addListener("mouseout",() => {
            infoWindow.close();
        })
    }
    locations = [
        {
            position:{ lat: 10.388297, lng:107.101414},
            content: 'Main Branch'
        },
        {
            position:{ lat: 10.384132, lng: 107.101503},
            content: 'Branch 1'
        },{
            position:{ lat: 10.391032, lng:107.104813},
            content: 'Branch 2'
        }
    ]

    locations.forEach(location => {
        addMarker(location);
    });

}