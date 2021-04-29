const http = new Http();

// FETCH DATA PARKIR DAN LOG
function getAllData() {
    // Get data Parkir
    http.get("http://localhost/carPresence/public/api/parkir")
        .then((data) => updateUi(data))
        .catch((err) => errUI(err));

    setTimeout(getAllData, 7000);
}

// UPDATE TAMPILAN SETELAH MENGAMBIL DATA
function updateUi(input) {
    console.log("Berhasil ambil data");

    // Set variabel bernilai 0 (STATUS RUANG PARKIR)
    let terisi = 0;
    let kosong = 0;
    let bermasalah = 0;
    let jumlah = 0;

    input.data.forEach((elm) => {
        // UBAH TAMPILAN STATUS RUANG PARKIR
        const element = document.getElementById(elm.variable_name);
        jumlah += 1;                                    // HITUNG INFO JUMLAH

        if (!element.classList.contains(elm.status)) {   // Ganti warna status ketersediaan, jika status berbeda dengan sebelumnya
            element.classList.toggle("kosong");
            element.classList.toggle("penuh");
        }
        
        // Jika status tidak baru, maka tidak merubah warna
        if(elm.warn_detect == "warning"){                           // STATUS WARNING KE RUNNING
            bermasalah += 1;                                        // HITUNG INFO WARNING
            if (!element.classList.contains(elm.warn_detect)) {     // Ganti warna status warning, jika status berbeda dengan sebelumnya
                element.classList.toggle("warning");
            }

            if(element.innerHTML != "Problem Sensor"){              // Ganti tulisan status warning, jika tulisan sebelumnya 'lokasi (S1)'
                element.innerHTML = "Problem Sensor";
            }
        }

        if(elm.warn_detect == "running"){                   // STATUS RUNNING KE WARNING
            if (element.classList.contains("warning")) {    // Menghilangkan warna status warning, jika sebelumnya berwarna status warning
                element.classList.toggle("warning");
            }

            if(element.innerHTML == "Problem Sensor"){      // Ganti tulisan lokasi, jika tulisan sebelumnya 'problem sensor'
                element.innerHTML = elm.location;
            }

            if (elm.status == 'kosong') kosong += 1;        // HITUNG INFO KOSONG
            else terisi += 1;                               // HITUNG INFO TERISI
        }

        document.querySelector('.info-jml-terisi').innerText = terisi;
        document.querySelector('.info-jml-kosong').innerText = kosong;
        document.querySelector('.info-jml-bermasalah').innerText = bermasalah;
        document.querySelector('.info-jml-lahan').innerText = jumlah;

        // SETELAH SELESAI UBAH TAMPILAN STATUS RUANG PARKIR
        // UBAH TAMPILAN PADA TABEL MODAL LOG PARKIR
        const obj = document.querySelector(`.body-table${elm.location}`);
        let html;
        let table = '';
        let itung = 1;
        if (elm.logs.length != 0) {
            elm.logs.forEach(log => {
                html = `<tr>
                            <td>${itung}</td>
                            <td>${log.start}</td>
                            <td>${log.end == null ? 'Belum Selesai' : log.end}</td>
                            <td>${log.end != null ? 'Selesai Diisi' : 'Sedang Terisi'}</td>
                        </tr>`;
                table = table.concat(html);
                itung++;
            });
        }
        if (elm.logs.length == 0) table = `<tr><td colspan='3'>Belum ada data</td></tr>`
        obj.innerHTML = table;

    });
}

// Error ketika fetch data, tampil error
function errUI(err) {
    console.log("Error, something went wrong." + err);
}

getAllData();