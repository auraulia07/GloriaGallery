/*!
* Start Bootstrap - Landing Page v6.0.6 (https://startbootstrap.com/theme/landing-page)
* Copyright 2013-2023 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-landing-page/blob/master/LICENSE)
*/
// This file is intentionally blank
// Use this file to add JavaScript to your project

let likeCount = 0;

function like() {
    likeCount++;
    document.getElementById('likeCount').innerText = likeCount;

    // Kirim permintaan POST ke rute /like menggunakan Axios atau fetch
    axios.post('/like', {
        photo_id: $foto_id, // Ganti 1 dengan ID foto yang sesuai
    })
    .then(function (response) {
        console.log(response.data.message);
    })
    .catch(function (error) {
        console.log(error);
    });
}

