<!-- customer Individual room view page  -->

<x-admin-layout>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap');

    * {
        box-sizing: border-box;
        padding: 0;
        margin: 0;
        font-family: 'Open Sans', sans-serif;
    }

    body {
        line-height: 1.5;
    }

    .card-wrapper {
        max-width: 1100px;
        margin-top: 100px;
        margin: 0 auto;
    }

    img {
        width: 80%;
        display: block;
    }

    .img-display {
        overflow: hidden;
    }

    .img-showcase {
        display: flex;
        height: 100%;
        width: 100%;
        transition: all 0.5s ease;
    }

    .img-showcase img {
        min-width: 100%;
    }

    .img-select {
        display: flex;
    }

    .img-item {
        margin: 0.3rem;
    }

    .img-item:nth-child(1),
    .img-item:nth-child(2),
    .img-item:nth-child(3) {
        margin-right: 0;
    }

    .img-item:hover {
        opacity: 0.8;
    }

    .product-content {
        padding: 2rem 1rem;
    }

    .product-title {
        font-size: 3rem;
        text-transform: capitalize;
        font-weight: 700;
        position: relative;
        color: #12263a;
        margin: 1rem 0;
    }

    .product-title::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        height: 4px;
        width: 80px;
        background: #12263a;
    }

    .product-link {
        text-decoration: none;
        text-transform: uppercase;
        font-weight: 400;
        font-size: 0.9rem;
        display: inline-block;
        margin-bottom: 0.5rem;
        background: #256eff;
        color: #fff;
        padding: 0 0.3rem;
        transition: all 0.5s ease;
    }

    .product-link:hover {
        opacity: 0.9;
    }

    .product-rating {
        color: #ffc107;
    }

    .product-rating span {
        font-weight: 600;
        color: #252525;
    }

    .product-price {
        margin: 1rem 0;
        font-size: 1rem;
        font-weight: 700;
    }

    .product-price span {
        font-weight: 400;
    }

    .last-price span {
        color: #f64749;
        text-decoration: line-through;
    }

    .new-price span {
        color: #256eff;
    }

    .product-detail h2 {
        text-transform: capitalize;
        color: #12263a;
        padding-bottom: 0.6rem;
    }

    .product-detail p {
        font-size: 0.9rem;
        padding: 0.3rem;
        opacity: 0.8;
    }

    .product-detail ul {
        margin: 1rem 0;
        font-size: 0.9rem;
    }

    .product-detail ul li {
        margin: 0;
        list-style: none;
        background: url(https://fadzrinmadu.github.io/hosted-assets/product-detail-page-design-with-image-slider-html-css-and-javascript/checked.png) left center no-repeat;
        background-size: 18px;
        padding-left: 1.7rem;
        margin: 0.4rem 0;
        font-weight: 600;
        opacity: 0.9;
    }

    .product-detail ul li span {
        font-weight: 400;
    }

    .purchase-info {
        margin: 1.5rem 0;
    }

    .purchase-info input,
    .purchase-info .btn {
        border: 1.5px solid #ddd;
        border-radius: 25px;
        text-align: center;
        padding: 0.45rem 0.8rem;
        outline: 0;
        margin-right: 0.2rem;
        margin-bottom: 1rem;
    }

    .purchase-info input {
        width: 60px;
    }

    .purchase-info .btn {
        cursor: pointer;
        color: #fff;
    }

    .purchase-info .btn:first-of-type {
        background: #256eff;
    }

    .purchase-info .btn:last-of-type {
        background: #f64749;
    }

    .purchase-info .btn:hover {
        opacity: 0.9;
    }


    @media screen and (min-width: 992px) {
        .card {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 1.5rem;
        }

        .card-wrapper {
            height: 100vh;
            display: flex;
            justify-content: center;
            /* align-items: center; */
        }

        .product-imgs {
            display: flex;
            flex-direction: column;
            margin-top: 40px;
            justify-content: start;
        }

        .product-content {
            padding-top: 0;
        }
    }
    </style>

    @foreach($image as $image)
    <?php

    $leads = json_decode($image->file, true); 
                                
                                ?>
    <div class="container">
        <button class="btn text-dark font-weight-bold btn-outline-primary col-md-2 mt-5" onclick="history.back()"><i
                class="bi bi-arrow-left me-1"></i>Back</button>

        <div class="card-wrapper mt-3">
            <div class="card">
                <div class="ml-5 product-imgs ">
                    <div class="img-display ">
                        <div class="img-showcase">
                            @if(isset($leads[0]))
                            <img src="{{ asset('images/'.$leads[0])}}" alt="Thumbnail [100%x225]">
                            @endif
                            @if(isset($leads[1]))
                            <img src="{{ asset('images/'.$leads[1])}}" alt="Thumbnail [100%x225]">
                            @endif
                            @if(isset($leads[2]))
                            <img src="{{ asset('images/'.$leads[2])}}" alt="Thumbnail [100%x225]">
                            @endif
                            @if(isset($leads[3]))
                            <img src="{{ asset('images/'.$leads[3])}}" alt="Thumbnail [100%x225]">
                            @endif
                        </div>
                    </div>
                    <div class="img-select">
                        <div class="img-item">
                            <a href="#" data-id="1">
                                @if(isset($leads[0]))

                                <img src="{{ asset('images/'.$leads[0])}}" alt="Thumbnail [100%x225]">
                                @endif
                            </a>
                        </div>
                        <div class="img-item">
                            <a href="#" data-id="2">
                                @if(isset($leads[1]))

                                <img src="{{ asset('images/'.$leads[1])}}" alt="Thumbnail [100%x225]">
                                @endif
                            </a>
                        </div>
                        <div class="img-item">
                            <a href="#" data-id="3">
                                @if(isset($leads[2]))

                                <img src="{{ asset('images/'.$leads[2])}}" alt="Thumbnail [100%x225]">
                                @endif
                            </a>
                        </div>
                        <div class="img-item">
                            <a href="#" data-id="4">
                                @if(isset($leads[3]))

                                <img src="{{ asset('images/'.$leads[3])}}" alt="Thumbnail [100%x225]">
                                @endif
                            </a>
                        </div>
                    </div>
                </div>

                <div class="product-content">
                    <h2 class="product-title">{{$image->owner}}</h2>
                    <a href="#" class="product-link">{{$image->address}}</a>
                    <div class="product-price">
                        <p class="new-price">Rent: <span>{{$image->rent}} Rupees</span></p>
                    </div>
                    <div class="product-detail">
                        <h2>about the home: </h2>
                        <ul>
                            <li>Owner Name: <span>{{$image->name}}</span></li>
                            <li>Contact: <span>{{$image->mobile}}</span></li>
                            <li>Floor: <span>{{$image->floor}}</span></li>
                            <li>Minimum stay: <span>{{$image->min}}</span></li>
                            <li>Maximum stay: <span>{{$image->max}}</span></li>



                        </ul>
                    </div>
                    @if($image->status == 'AVAILABLE')
                    <button type="button" class="btn btn-info btn-lg btn-outline-success" data-rtype="Deluxe"
                        data-toggle="modal" data-target=".book-now-modal-lg{{$image->id}}">
                        Book
                    </button>
                    @endif
                    @endforeach
                    <div class="text-center mt-5 col-md-6">
                        @foreach($ava_status as $ava)

                        @if($ava->books_status == 'PENDING' || $ava->books_status == 'CONFIRM')

                        <button type="button" class="btn btn-lg btn-outline-success">
                            Not Available
                        </button>

                        @endif
                        @endforeach


                    </div>



                </div>
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script>
    $(document).ready(function() {
        // alert("fdgdf");
        $("#myform").validate({
            rules: {
                field: {
                    days: {
                        required: true,
                        minlength: 2
                    },
                }
            },

            messages: {
                days: {
                    required: "enter correct value".
                }
            }
        });
    });
    </script>
    <script>
    $(document).ready(function() {

        $("#txtToDate").change(function() {
            var start = new Date($('#txtFormDate').val());
            var end = new Date($('#txtToDate').val());
            diff = new Date(end - start),
                days = diff / 1000 / 60 / 60 / 24;
            if (days == NaN) {
                $('#days').val(0);
            } else {
                // alert(days);
                $('#days').val(days);
            }
        });
    });
    </script>

    <script>
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
    })
    </script>


    <script>
    $(document).ready(function() {
        // dynamically entered room type value on show modal
        $('.book-now-modal-lg').on('show.bs.modal', function(event) {
            let button = $(event.relatedTarget);
            let roomType = button.data('rtype');
            let modal = $(this);
            modal.find('.modal-body select[name=roomType]').val(roomType);
        });
    });
    </script>
    <script>
    const imgs = document.querySelectorAll('.img-select a');
    const imgBtns = [...imgs];
    let imgId = 1;

    imgBtns.forEach((imgItem) => {
        imgItem.addEventListener('click', (event) => {
            event.preventDefault();
            imgId = imgItem.dataset.id;
            slideImage();
        });
    });

    function slideImage() {
        const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

        document.querySelector('.img-showcase').style.transform =
            `translateX(${- (imgId - 1) * displayWidth}px)`;
    }

    window.addEventListener('resize', slideImage);
    </script>
</x-admin-layout>