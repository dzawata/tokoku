@extends('layouts.auth')

@section('title', 'Register')

@section('content')
<div class="page-content page-auth mt-5" id="register" style="margin-top: 300px;">
    <div class="section-store-auth" data-aos="fade-up">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <h2>
                        Memulai untuk jual beli <br />
                        dengan cara terbaru
                    </h2>

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" class="form-control is-valid" name="name" aria-describedby="nameHelp" v-model="name" autofocus />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control is-invalid" name="email" aria-describedby="emailHelp" v-model="email" />
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Password Confirmation</label>
                            <input type="password" name="password_confirmation" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Store</label>
                            <p class="text-muted">
                                Apakah anda juga ingin membuka toko?
                            </p>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input class="custom-control-input" type="radio" name="is_store_open" id="openStoreTrue" v-model="is_store_open" :value="true" />
                                <label class="custom-control-label" for="openStoreTrue">Iya, boleh</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input class="custom-control-input" type="radio" name="is_store_open" id="openStoreFalse" v-model="is_store_open" :value="false" />
                                <label makasih class="custom-control-label" for="openStoreFalse">Enggak, makasih</label>
                            </div>
                        </div>
                        <div class="form-group" v-if="is_store_open">
                            <label>Nama Toko</label>
                            <input type="text" name="store_name" class="form-control" aria-describedby="storeHelp" />
                        </div>
                        <div class="form-group" v-if="is_store_open">
                            <label>Kategori</label>
                            <select name="categories_id" class="form-control">
                                <option value="" selected disabled>Select Category</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success btn-block mt-4">
                            Sign Up Now
                        </button>
                        <a href="{{ route('login') }}" class="btn btn-signup btn-block mt-2">
                            Back to Sign In
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
<script src="/vendor/vue/vue.js"></script>
<script src="https://unpkg.com/vue-toasted"></script>
<script>
    Vue.use(Toasted);

    var register = new Vue({
        el: "#register",
        mounted() {
            AOS.init();
            // this.$toasted.error(
            //     "Maaf, tampaknya email sudah terdaftar pada sistem kami.", {
            //         position: "top-center",
            //         className: "rounded",
            //         duration: 1000,
            //     }
            // );
        },
        data: {
            name: "Angga Hazza Sett",
            email: "kamujagoan@bwa.id",
            password: "",
            is_store_open: true,
            store_name: "",
        },
    });
</script>
<script src="/script/navbar-scroll.js"></script>
@endpush