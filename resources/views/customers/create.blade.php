<div class="modal fade" id="smallModal" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Leave Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="modal-body">
                <form action="{{ route('customers.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col mb-3">
                            <label for="name" class="form-label">Customers Name</label>
                            <input type="text" name="name" placeholder="insert your name" class="form-control"
                                autocomplete="off">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" placeholder="insert your email" class="form-control"
                                autocomplete="off">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="nameBasic" class="form-label">Phone</label>
                            <input type="text" name="phone" placeholder="your phone numbers"
                                class="form-control" autocomplete="off" onkeypress="return hanyaAngka(event)">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label id="addressLabel" class="form-label">Address</label>
                            <select id="selectProvinsi" class="form-control mt-2" onchange="fetchKota()"></select>
                            <select id="selectKota" class="form-control mt-2" onchange="fetchKecamatan()"></select>
                            <select id="selectKecamatan" class="form-control mt-2" onchange="fetchKelurahan()"></select>
                            <select id="selectKelurahan" class="form-control mt-2" ></select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label id="addressLabel" class="form-label">Full Address</label>
                            <textarea name="address" id="addressInput" cols="30" rows="10"
                                class="form-control" value="" autocomplete="off"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }

    const selectProvinsi = document.getElementById('selectProvinsi');
    const selectKota = document.getElementById('selectKota');
    const selectKecamatan = document.getElementById('selectKecamatan');
    const selectKelurahan = document.getElementById('selectKelurahan');
    const addressInput = document.getElementById('addressInput');

    // Fetch Provinsi
    async function fetchProvinsi() {
        const response = await fetch('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json');
        const data = await response.json();

        selectProvinsi.innerHTML = '<option value="">Choose province</option>';

        data.forEach(provinsi => {
            const option = document.createElement('option');
            option.value = provinsi.id;
            option.textContent = provinsi.name;
            selectProvinsi.appendChild(option);
        });
    }

    // Fetch Kota berdasarkan Provinsi terpilih
    async function fetchKota() {
        const provinsiId = selectProvinsi.value;
        if (provinsiId) {
            const response = await fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinsiId}.json`);
            const data = await response.json();

            selectKota.innerHTML = '<option value="">Choose City</option>';

            data.forEach(kota => {
                const option = document.createElement('option');
                option.value = kota.id;
                option.textContent = kota.name;
                selectKota.appendChild(option);
            });
        } else {
            selectKota.innerHTML = '<option value="">Choose City</option>';
            selectKecamatan.innerHTML = '<option value="">Choose District</option>';
            selectKelurahan.innerHTML = '<option value="">Choose Sub-district</option>';
        }
        updateAddress();
    }

    // Fetch Kecamatan berdasarkan Kota terChoose
    async function fetchKecamatan() {
        const kotaId = selectKota.value;
        if (kotaId) {
            const response = await fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${kotaId}.json`);
            const data = await response.json();

            selectKecamatan.innerHTML = '<option value="">Choose District</option>';

            data.forEach(kecamatan => {
                const option = document.createElement('option');
                option.value = kecamatan.id;
                option.textContent = kecamatan.name;
                selectKecamatan.appendChild(option);
            });
        } else {
            selectKecamatan.innerHTML = '<option value="">Choose District</option>';
            selectKelurahan.innerHTML = '<option value="">Choose Sub-district</option>';
        }
        updateAddress();
    }

    // Fetch Kelurahan berdasarkan Kecamatan terChoose
    async function fetchKelurahan() {
        const kecamatanId = selectKecamatan.value;
        if (kecamatanId) {
            const response = await fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/villages/${kecamatanId}.json`);
            const data = await response.json();

            selectKelurahan.innerHTML = '<option value="">Choose Sub-district</option>';

            data.forEach(kelurahan => {
                const option = document.createElement('option');
                option.value = kelurahan.id;
                option.textContent = kelurahan.name;
                selectKelurahan.appendChild(option);
            });
        } else {
            selectKelurahan.innerHTML = '<option value="">Choose Sub-district</option>';
        }
        updateAddress(); // Panggil fungsi updateAddress() saat pilihan kelurahan berubah
    }
    selectKelurahan.addEventListener('change', updateAddress);

    // Update alamat saat pilihan berubah
    function updateAddress() {
        const provinsiName = selectProvinsi.options[selectProvinsi.selectedIndex].textContent;
        const kotaName = selectKota.options[selectKota.selectedIndex].textContent;
        const kecamatanName = selectKecamatan.options[selectKecamatan.selectedIndex].textContent;
        const kelurahanName = selectKelurahan.options[selectKelurahan.selectedIndex].textContent;

        const address = `${provinsiName}, ${kotaName}, ${kecamatanName}, ${kelurahanName},`;
        addressInput.value = address;
    }

    // Panggil fungsi fetchProvinsi saat halaman dimuat
    fetchProvinsi();
</script>