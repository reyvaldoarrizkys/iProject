@extends('layouts-front.master', ['title' => 'Profile'])
@section('content')
    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="checkout-steps-form-style-1">
                        <ul id="accordionExample">
                            <li>
                                <h6 class="title" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                    aria-expanded="true" aria-controls="collapseThree">Your Personal Details </h6>
                                <section class="checkout-steps-form-content collapse show" id="collapseThree"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    @foreach ($customer as $customers)
                                        <form action="{{ route('profileUpdate',$customers->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                @if ($customer)
                                                    @foreach ($customer as $value)
                                                        <div class="col-md-6">
                                                            <div class="single-form form-default">
                                                                <label>Full Name</label>
                                                                <div class="form-input form">
                                                                    <input type="text" name="name" placeholder="Full Name"
                                                                        value="{{ $value->name }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="single-form form-default">
                                                                <label>Username</label>
                                                                <div class="form-input form">
                                                                    <input type="text" name="username" placeholder="Username"
                                                                        value="{{ $value->username }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="single-form form-default">
                                                                <label>Email</label>
                                                                <div class="form-input form">
                                                                    <input type="text" name="email" placeholder="Email"
                                                                        value="{{ $value->email }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="single-form form-default">
                                                                <label>Phone Number</label>
                                                                <div class="form-input form">
                                                                    <input type="text" name="phone" placeholder="Phone Number"
                                                                        value="{{ $value->phone }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="single-form form-default">
                                                                <label>Province</label>
                                                                <div class="form-input form">
                                                                    <select id="selectProvinsi" class="form-control mt-2"
                                                                        onchange="fetchKota()"></select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="single-form form-default">
                                                                <label>City</label>
                                                                <div class="form-input form">
                                                                    <select id="selectKota" class="form-control mt-2"
                                                                        onchange="fetchKecamatan()"></select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="single-form form-default">
                                                                <label>District</label>
                                                                <div class="form-input form">
                                                                    <select id="selectKecamatan" class="form-control mt-2"
                                                                        onchange="fetchKelurahan()"></select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="single-form form-default">
                                                                <label>Sub District</label>
                                                                <div class="form-input form">
                                                                    <select id="selectKelurahan"
                                                                        class="form-control mt-2"></select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="single-form form-default">
                                                                <label>Full Address</label>
                                                                <div class="form-label">
                                                                    <textarea name="address" id="addressInput" cols="50" rows="10" class="form-control"
                                                                        autocomplete="off" placeholder="Full Address">{{ $value->address }}</textarea>
                                                                        
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <!-- Handle the case when the customer is not found -->
                                                    <p>No customer found.</p>
                                                @endif
                                                <div class="col-md-12">
                                                    <div class="single-form button">
                                                        <button type="submit" class="btn" data-bs-toggle="collapse"
                                                            data-bs-target="#collapseFour" aria-expanded="false"
                                                            aria-controls="collapseFour">Update</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </form>
                                    @endforeach
                                </section>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
                const response = await fetch(
                    `https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinsiId}.json`);
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
                const response = await fetch(
                    `https://www.emsifa.com/api-wilayah-indonesia/api/districts/${kotaId}.json`);
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
                const response = await fetch(
                    `https://www.emsifa.com/api-wilayah-indonesia/api/villages/${kecamatanId}.json`);
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
    @include('sweetalert::alert')
@endsection
