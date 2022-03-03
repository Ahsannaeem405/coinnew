@extends('../layouts/main')
@section('title')
Audit
@endsection
@section('body_content')

<style>

                * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                transition: all 0.25s linear;
                }

                body {
                font-family: 'Inter', sans-serif;
                color: #fff;
                overflow-x: hidden;
                }

                .content__accordion {
                padding: 40px 0;
                }

                .accordion {
                width: 90%;
                margin: 0 auto;
                }

                .accordion__wrapper,
                .accordion__item {
                display: flex;
                flex-direction: column;
                width: 100;
                }

                .accordion__wrapper {
                gap: 12px;
                }

                .accordion__item--summary,
                .accordion__item--detail {
                width: 100%;
                display: flex;
                align-items: center;
                gap: 12px;
                padding: 12px;
                border: 1px solid rgb(245,212,120);
                border-radius: 8px;
                box-shadow: #fff;
                }

                .accordion__item--summary {
                flex-direction: row;
                background: #383737;
                border: 3px solid #E2AB10;
                /* background: linear-gradient(90deg, rgba(245,212,120,1) 0%, rgba(255,204,60,1) 100%); */
                cursor: pointer;
                }

                .accordion__item--detail {
                margin-top: 0px;
               background-color: #252525;
                max-height: 0;
                opacity: 0;
                padding: 0;
                border: 1px solid #fff;
                visibility: hidden;
                overflow: hidden;
                }

                .accordion__item-title h5 {
                font-size: 18px;
                font-weight: 600;
                line-height: 24px;
                letter-spacing: 0.5px;
                }

                .accordion__item-toggler {
                margin-left: auto;
                }

                .accordion__item-toggler button {
                border: none;
                outline: none;
                background-color: transparent;
                color: #fff;
                }

                .accordion__detail-section {
                padding: 12px;
                font-size: 16px;
                line-height: 22px;
                letter-spacing: 0.3px;
                color: #fff;
                }

                .accordion__item--active .accordion__item-toggler button i {
                transform: rotate(180deg);
                }

                .accordion__item--active .accordion__item--detail {
                max-height: 300px;
                opacity: 1;
                visibility: visible;
                margin-top: 12px;
                border: 5px solid black;
                }
    </style>
<div class="container">
	<div class="row mb-5 mt-5 justify-content-center">
		<div class="col-12">
            <div class="faq-div">
                <h2 class="faq-heading">FAQ</h2>
                  <!-- accordion -->

            <div class="content content__accordion">
                <div class="accordion">
                <div class="accordion__wrapper">
                    <div class="accordion__item">
                    <div class="accordion__item--summary">
                        <div class="accordion__item-icon">
                        <i class="fas fa-fw fa-futbol"></i>
                        </div>
                        <div class="accordion__item-title">
                        <h5>Question #1</h5>
                        </div>
                        <div class="accordion__item-toggler">
                        <button>
                            <i class="fas fa-fw fa-angle-down"></i>
                        </button>
                        </div>
                    </div>
                    <div class="accordion__item--detail">
                        <div class="accordion__detail">
                        <div class="accordion__detail-section">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                        </div>
                        <div class="accordion__detail-section">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </div>
                        </div>
                    </div>
                    </div>


                    <div class="accordion__item">
                        <div class="accordion__item--summary">
                            <div class="accordion__item-icon">
                                <i class="fas fa-fw fa-futbol"></i>
                            </div>
                            <div class="accordion__item-title">
                                <h5>Question #2</h5>
                            </div>
                            <div class="accordion__item-toggler">
                                <button>
                                    <i class="fas fa-fw fa-angle-down"></i>
                                </button>
                            </div>
                        </div>
                        <div class="accordion__item--detail">
                            <div class="accordion__detail">
                                <div class="accordion__detail-section">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                                </div>
                                <div class="accordion__detail-section">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion__item">
                        <div class="accordion__item--summary">
                            <div class="accordion__item-icon">
                                <i class="fas fa-fw fa-futbol"></i>
                            </div>
                        <div class="accordion__item-title">
                        <h5>Question #3</h5>
                    </div>
                    <div class="accordion__item-toggler">
                        <button>
                            <i class="fas fa-fw fa-angle-down"></i>
                        </button>
                        </div>
                    </div>
                    <div class="accordion__item--detail">
                        <div class="accordion__detail">
                            <div class="accordion__detail-section">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                            </div>
                            <div class="accordion__detail-section">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                            </div>
                        </div>
                    </div>
                    </div>

                    <div class="accordion__item">
                        <div class="accordion__item--summary">
                            <div class="accordion__item-icon">
                                <i class="fas fa-fw fa-futbol"></i>
                            </div>
                        <div class="accordion__item-title">
                        <h5>Question #4</h5>
                    </div>
                    <div class="accordion__item-toggler">
                        <button>
                            <i class="fas fa-fw fa-angle-down"></i>
                        </button>
                        </div>
                    </div>
                    <div class="accordion__item--detail">
                        <div class="accordion__detail">
                            <div class="accordion__detail-section">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                            </div>
                            <div class="accordion__detail-section">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>

            </div>
        </div>
	</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script>
                const accordionItems = document.querySelectorAll(".accordion__item--summary");
                    accordionItems.forEach(function(item) {
                    item.addEventListener("click", function(event) {
                        event.stopPropagation();
                        item.parentNode.classList.toggle("accordion__item--active");
                    });
                    });
            </script>

@endsection
