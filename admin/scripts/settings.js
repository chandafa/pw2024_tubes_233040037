
let general_data;

// function get_general() {
//     let site_title = document.getElementById("site_title");
//     let site_about = document.getElementById("site_about");

//     let site_title_inp = document.getElementById("site_title_inp");
//     let site_about_inp = document.getElementById("site_about_inp");

//     let shutdown_toggle = document.getElementById("shutdown-toggle");

//     let xhr = new XMLHttpRequest();
//     xhr.open("POST", "ajax/settings_crud.php", true);
//     xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");


//     xhr.onload = function () {
//         general_data = JSON.parse(this.responseText);

//         site_title.innerText = general_data.site_title;
//         site_about.innerText = general_data.site_about;

//         site_title_inp.value = general_data.site_title;
//         site_about_inp.value = general_data.site_about;

//         if (general_data.shutdown == 0) {
//             shutdown_toggle.checked = false;
//             shutdown_toggle.value = 0;
//         } else {
//             shutdown_toggle.checked = true;
//             shutdown_toggle.value = 1;
//         }
//     }

//     xhr.send("get_general");
// }

function get_general() {
    let site_title = document.getElementById("site_title");
    let site_about = document.getElementById("site_about");

    let site_title_inp = document.getElementById("site_title_inp");
    let site_about_inp = document.getElementById("site_about_inp");

    let shutdown_toggle = document.getElementById("shutdown-toggle");

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/settings_crud.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        console.log(this.responseText);  // Tambahkan ini untuk melihat respon dari server

        let general_data;
        try {
            general_data = JSON.parse(this.responseText);
        } catch (e) {
            console.error("Failed to parse JSON response", e);
            return;
        }

        console.log(general_data);  // Tambahkan ini untuk melihat data yang telah di-parse

        site_title.innerText = general_data.site_title;
        site_about.innerText = general_data.site_about;

        site_title_inp.value = general_data.site_title;
        site_about_inp.value = general_data.site_about;

        if (general_data.shutdown == 0) {
            shutdown_toggle.checked = false;
            shutdown_toggle.value = 0;
        } else {
            shutdown_toggle.checked = true;
            shutdown_toggle.value = 1;
        }
    }

    xhr.onerror = function () {
        console.error("Request failed");
    }

    xhr.send("get_general");
}

document.addEventListener("DOMContentLoaded", function () {
    get_general();
});



general_s_form.addEventListener("submit", function (e) {
    e.preventDefault();
    upd_general(site_title_inp.value, site_about_inp.value);
});

function upd_general(site_title_val, site_about_val) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/settings_crud.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onload = function () {

        var myModal = document.getElementById('general-s');
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();

        if (this.responseText == 1) {
            alert("success", "Data berhasil diupdate")
            get_general();
        } else {
            alert("error", "Data tidak berhasil diupdate")
        }

    }

    // Correct the typo from side_title_val to site_title_val
    xhr.send("site_title=" + encodeURIComponent(site_title_val) + "&site_about=" + encodeURIComponent(
        site_about_val) + "&upd_general");
}

function upd_shutdown(val) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/settings_crud.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        if (this.responseText == 1 && general_data.shutdown == 0) {
            alert("success", "Website shutdown")
        } else {
            alert("success", "Website not shutdown")
        }
        get_general();

    }

    // Correct the typo from side_title_val to site_title_val
    xhr.send("upd_shutdown=" + val);
}

team_s_form.addEventListener("submit", function (e) {

    e.preventDefault();
    add_member();
});


window.onload = function () {
    get_general();
}
