const http = new Http();

function getAllData() {
    // Get Parkir
    http.get("http://localhost/carPresence/public/api/parkir")
        .then((data) => updateUi(data))
        .catch((err) => errUI(err));

    setTimeout(getAllData, 1500);
}

function updateUi(arr) {
    console.log("masuk updateUi");
    // console.log(arr.data);

    arr.data.forEach((elm) => {
        const element = document.getElementById(elm.variable_name);

        if (elm.status == "kosong") {
            if (element.classList.contains("occupied")) {
                element.classList.toggle("occupied");
                element.classList.toggle("free");
            }
        }

        if (elm.status == "penuh") {
            if (element.classList.contains("free")) {
                element.classList.toggle("free");
                element.classList.toggle("occupied");
            }
        }
    });
}

function errUI(err) {
    console.log("Error, something went wrong." + err);
}

getAllData();
