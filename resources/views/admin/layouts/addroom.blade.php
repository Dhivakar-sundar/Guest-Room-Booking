           <!-- Admin Room add page -->


<x-Admin-layout>
    <style>
    .file-upload {
        background-color: #ffffff;
        width: 600px;
        margin: 0 auto;
        padding: 20px;
    }

    .file-upload-btn {
        width: 100%;
        margin: 0;
        color: #fff;
        background: skyblue;
        border: none;
        padding: 10px;
        border-radius: 4px;
        border-bottom: 4px solid gray;
        transition: all .2s ease;
        outline: none;
        text-transform: uppercase;
        font-weight: 700;
    }

    .file-upload-btn:hover {
        background: #1AA059;
        color: #ffffff;
        transition: all .2s ease;
        cursor: pointer;
    }

    .file-upload-btn:active {
        border: 0;
        transition: all .2s ease;
    }

    .file-upload-content {
        display: none;
        text-align: center;
    }

    .file-upload-input {
        position: absolute;
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        outline: none;
        opacity: 0;
        cursor: pointer;
    }

    .image-upload-wrap {
        margin-top: 20px;
        border: 4px dashed #1FB264;
        position: relative;
    }

    .image-dropping,
    .image-upload-wrap:hover {
        background-color: #1FB264;
        border: 4px dashed #ffffff;
    }

    .image-title-wrap {
        padding: 0 15px 15px 15px;
        color: #222;
    }

    .drag-text {
        text-align: center;
    }

    .drag-text h3 {
        font-weight: 100;
        text-transform: uppercase;
        color: #15824B;
        padding: 60px 0;
    }

    .file-upload-image {
        max-height: 200px;
        max-width: 200px;
        margin: auto;
        padding: 20px;
    }

    .remove-image {
        width: 200px;
        margin: 0;
        color: #fff;
        background: #cd4535;
        border: none;
        padding: 10px;
        border-radius: 4px;
        border-bottom: 4px solid #b02818;
        transition: all .2s ease;
        outline: none;
        text-transform: uppercase;
        font-weight: 700;
    }

    .remove-image:hover {
        background: #c13b2a;
        color: #ffffff;
        transition: all .2s ease;
        cursor: pointer;
    }

    .remove-image:active {
        border: 0;
        transition: all .2s ease;
    }



    input[type="text"],
    select.form-control {
        background: transparent;
        border: none;
        border-bottom: 1px solid #000000;
        -webkit-box-shadow: none;
        box-shadow: none;
        border-radius: 0;
    }

    input[type="text"]:focus,
    select.form-control:focus {
        -webkit-box-shadow: none;
        box-shadow: none;
    }
    </style>
@if (Session::has('message'))
   <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif


                <div class="card bg-light mt-4">
                    <div class="card-header">
                        <header class="h3">Add Room Details</header>
                    </div>
                    <div class="card-content">
                        <div class="row">
                            <form class="col-md-10 offset-1" action="{{route('admin_addroom_create')}}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @auth('admin')
                                <input type="text" name="admin_id" value="{{ Auth::guard('admin')->user()->id}}" hidden>
                                @endauth
                                <div class="row mb-3 mt-5">
                                    <div class="col-md-5 me-5">
                                        <label for="icon_prefix">Room Name</label>
                                        <input id="icon_prefix" type="text" class="form-control" name="owner" required>

                                    </div>
                                    <div class="col-md-5">
                                        <label for="icon_telephone">Telephone</label>
                                        <input id="icon_telephone" type="text" class="form-control" name="telephone"
                                            required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class=" col-md-5 me-5">
                                        <label for="">Address</label>
                                        <textarea id="" type="text" class="form-control" name="address"
                                            required> </textarea>

                                    </div>
                                    <div class=" col-md-5">
                                        <label for="">Room Floor</label>
                                        <input id="" type="text" class="form-control" name="floor" required>

                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="">Bed Type</label>
                                    <div class=" col-md-2">
                                        <p>
                                            <label>
                                                <input type="radio" name="bed" value="single" required>
                                                <span>Single</span>
                                            </label>
                                        </p>
                                    </div>
                                    <div class="  col-md-2">
                                        <p>
                                            <label>
                                                <input type="radio" name="bed" value="double">
                                                <span>Double</span>
                                            </label>
                                        </p>
                                    </div>
                                    <div class="  col-md-2">
                                        <p>
                                            <label>
                                                <input type="radio" name="bed" value="king">
                                                <span>King</span>
                                            </label>
                                        </p>
                                    </div>

                                    <div class=" col-md-4">
                                        <label for="">Rent Per Night</label>
                                        <input id="" type="text" class="form-control" name="rent">

                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class=" col-md-5 me-4">
                                        <label for="">Minimum booking duration</label>
                                        <input id="" type="text" class="form-control" name="min" required>

                                    </div>
                                    <div class=" col-md-5">
                                        <label for="">Maximum booking duration</label>
                                        <input id="" type="text" class="form-control" name="max" required>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="status" value="AVAILABLE" hidden>

                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="row">
                                    <div class=" col-md-5">
                                        <div class="file-field input-field">
                                            <div class="btn">
                                                <span>Upload Images</span>
                                                <input type="file" name="file[]" multiple required>
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path form-control" type="text"
                                                    placeholder="Upload one or more files">
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="row mb-3">
                                    <div class=" col-md-10">
                                        <label for="">Facility</label>
                                        <textarea id="" type="text" class="form-control" name="facility"
                                            required> </textarea>

                                    </div>
                                </div>
                                <div class="row">

                                    <div class="file-upload">
                                        <button class="file-upload-btn" type="button"
                                            onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>

                                        <div class="image-upload-wrap">
                                            <input class="file-upload-input" name="file[]" type='file'
                                                onchange="readURL(this);" accept="image/*" multiple>
                                            <div class="drag-text">
                                                <h3>Drag and drop a file or select add Image</h3>
                                            </div>
                                        </div>
                                        <div class="file-upload-content">
                                            <img class="file-upload-image" src="#" alt="your image" />
                                            <div class="image-title-wrap">
                                                <button type="button" onclick="removeUpload()"
                                                    class="remove-image">Remove <span class="image-title">Uploaded
                                                        Image</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center mb-5 ">
                                    <button type="submit" class="btn btn-info col-md-5">Submit</button>

                                </div>
                            </form>
                        </div>


                    </div>
                </div>


            <!-- </div> -->
        <!-- </div> -->


    <!-- </div> -->
    <script>
    function readURL(input) {
        if (input.files && input.files[0]) {

            var reader = new FileReader();

            reader.onload = function(e) {
                $('.image-upload-wrap').hide();

                $('.file-upload-image').attr('src', e.target.result);
                $('.file-upload-content').show();

                $('.image-title').html(input.files[0].name);
            };

            reader.readAsDataURL(input.files[0]);

        } else {
            removeUpload();
        }
    }

    function removeUpload() {
        $('.file-upload-input').replaceWith($('.file-upload-input').clone());
        $('.file-upload-content').hide();
        $('.image-upload-wrap').show();
    }
    $('.image-upload-wrap').bind('dragover', function() {
        $('.image-upload-wrap').addClass('image-dropping');
    });
    $('.image-upload-wrap').bind('dragleave', function() {
        $('.image-upload-wrap').removeClass('image-dropping');
    });
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems, options);
    });

    // Or with jQuery

    $(document).ready(function() {
        $('select').formSelect();
    });
    </script>
</x-Admin-layout>