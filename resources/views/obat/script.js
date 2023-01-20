$("#btnCari").select(function() {
            // var nama = document.getElementById("nama").value;
            console.log("nama");
        });

        // function cari() {
        //     console.log("Nama");
        //     $("#idPasien").remove();
        //     $("#namePasien").remove();
        //     $("#button").remove();
        //     var nama = document.getElementById("nama").value;
        //     console.log(nama);
        //     getNik(nama);
        // }

        function getNik(nama) {
            $.ajax({
                type: "GET",
                url: '/obat/cari/' + nama,
                dataType: 'json',
                success: function(data) {
                    if (data.name !== undefined) {
                        $("#namaPasien").append(
                            `
                        <input type="text" class="form-control" id="namePasien" value="` + data.name + `" disabled>
                        <input type="hidden" name="userId" class="form-control" id="idPasien" value="` + data.id + `">
                        <button type="submit" class="btn btn-primary float-left mt-3" id="button">Konfirmasi</button>
                        `
                        );
                    } else {
                        $("#pilihanObat").remove();
                        $("#pasien").append(
                            `
                            <div class="container d-flex justify-content-center" id="container">
                                    <span>Data tidak ditemukan!</span>
                                </div>
                            `
                        );
                    }
                }
            });
        }

        function deleteView() {
            $("#namaPasien").hide();
            $("#pilihanObat").remove();
        }

        function cariKonsumsi() {
            $("#idPasienKonsumsi").remove();
            $("#pasienKonsumsi").remove();
            $("#buttonKonsumsi").remove();
            var nama = document.getElementById("nikKonsumsi").value;
            getNikKonsumsi(nama);
        }

        function getNikKonsumsi(nama) {
            $.ajax({
                type: "GET",
                url: '/obat/cari/' + nama,
                dataType: 'json',
                success: function(data) {
                    if (data.name !== undefined) {
                        $("#namaPasienKonsumsi").append(
                            console.log(data);
                        );
                    } else {
                        $("#konsumsiObat").append(
                            `
                            <div class="container d-flex justify-content-center" id="container">
                                    <span>Data tidak ditemukan!</span>
                                </div>
                            `
                        );
                    }
                }
            });
        }