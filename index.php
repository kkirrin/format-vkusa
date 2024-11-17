<?php
/*
    Template Name: главная
    */
?>

<?php get_header(); ?>


<main>
    <section id="main_banner" data-scroll>
        <div class="container">

            <h1 class="hidden">заголовок</h1>

            <div class="main-swiper overflow-hidden">
                <div class="main-item relative">
                    <div class="swiper-wrapper">

                        <?php
                        $args = array(
                            'post_type' => 'banners_on_main',
                            'posts_per_page' => -1,
                        );

                        $data = get_posts($args);

                        foreach ($data as $post):
                            setup_postdata($post);

                            $img1 = get_field('banner_1');
                            $img2 = get_field('banner_2');
                            $img3 = get_field('banner_3');

                            $img_url_1 = esc_url($img1['url']);
                            $img_url_2 = esc_url($img2['url']);
                            $img_url_3 = esc_url($img3['url']);

                            echo  ' <div class="swiper-slide">';
                            echo '     <img class="w-full md:block sm:hidden hidden" src="' . $img_url_1 . '" alt="">';
                            echo '     <img class="w-full md:hidden sm:block hidden" src="' . $img_url_2 . '" alt="">';
                            echo '     <img class="w-full md:hidden sm:hidden block" src="' . $img_url_3 . '" alt="">';
                            echo ' </div>';
                        ?>

                        <?php
                        endforeach;

                        ?>
                    </div>
                </div>
            </div>
    </section>

    <section id="popular" data-scroll>
        <div class="container relative">


            <div class="flex justify-between md:items-center items-start md:flex-row flex-col gap-[20px] md:pb-[40px] pb-[30px]">
                <div>
                    <h2 class="font-bold md:text-[55px] text-[28px] uppercase">
                        Популярное
                    </h2>
                </div>

                <div class="border py-[10px] px-[20px]">
                    <button type="button" class="flex items-center justify-center gap-[10px]">

                        <a href="">
                            <span class="uppercase">
                                Больше
                            </span>
                        </a>

                        <svg width="24" height="16" viewBox="0 0 24 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M23.7071 8.70711C24.0976 8.31658 24.0976 7.68342 23.7071 7.29289L17.3431 0.928932C16.9526 0.538408 16.3195 0.538408 15.9289 0.928932C15.5384 1.31946 15.5384 1.95262 15.9289 2.34315L21.5858 8L15.9289 13.6569C15.5384 14.0474 15.5384 14.6805 15.9289 15.0711C16.3195 15.4616 16.9526 15.4616 17.3431 15.0711L23.7071 8.70711ZM0 9H23V7H0V9Z" fill="#262626" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="flex justify-between items-center w-full absolute top-[233px] z-[10]">
                <div class="swiper-popular-prev">
                    <button class="relative right-[20px]">
                        <svg width="55" height="55" viewBox="0 0 55 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="27.5" cy="27.5" r="27.5" transform="matrix(-1 0 0 1 55 0)" fill="#262626" />
                            <path d="M15.2929 27.7071C14.9024 27.3166 14.9024 26.6834 15.2929 26.2929L21.6569 19.9289C22.0474 19.5384 22.6805 19.5384 23.0711 19.9289C23.4616 20.3195 23.4616 20.9526 23.0711 21.3431L17.4142 27L23.0711 32.6569C23.4616 33.0474 23.4616 33.6805 23.0711 34.0711C22.6805 34.4616 22.0474 34.4616 21.6569 34.0711L15.2929 27.7071ZM40 28L16 28L16 26L40 26L40 28Z" fill="white" />
                        </svg>
                    </button>
                </div>

                <div class="swiper-popular-next">
                    <button class="relative -left-[20px]">
                        <svg width="55" height="55" viewBox="0 0 55 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="27.5" cy="27.5" r="27.5" fill="#262626" />
                            <path d="M39.7071 27.7071C40.0976 27.3166 40.0976 26.6834 39.7071 26.2929L33.3431 19.9289C32.9526 19.5384 32.3195 19.5384 31.9289 19.9289C31.5384 20.3195 31.5384 20.9526 31.9289 21.3431L37.5858 27L31.9289 32.6569C31.5384 33.0474 31.5384 33.6805 31.9289 34.0711C32.3195 34.4616 32.9526 34.4616 33.3431 34.0711L39.7071 27.7071ZM15 28L39 28L39 26L15 26L15 28Z" fill="white" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="swiper-popular overflow-hidden relative">
                <div class="popular-item relative py-[40px]">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide flex flex-col gap-[10px]">
                            <div class="h-full border border-lightGray">
                                <img class="w-full h-full object-contain" src="<?php echo get_template_directory_uri(); ?>/imgs/popular-p-1.png" alt="" />
                            </div>

                            <div>
                                <span class="text-[16px]">
                                    Лапша органическая рисовая Коричневый рис BIO, Perfect Earth, 225г Таиланд
                                </span>
                            </div>

                            <div class="w-[129px] bg-lightGray p-[5px]">
                                <span class="font-bold">100</span>
                                <button>+</button>
                            </div>
                        </div>
                        <div class="swiper-slide flex flex-col gap-[10px]">
                            <div class="h-full border border-lightGray">
                                <img class="w-full h-full object-contain" src="<?php echo get_template_directory_uri(); ?>/imgs/popular-p-2.png" alt="" />
                            </div>

                            <div>
                                <span class="text-[16px]">
                                    Лапша органическая рисовая Коричневый рис BIO, Perfect Earth, 225г Таиланд
                                </span>
                            </div>

                            <div class="w-[129px] bg-lightGray p-[5px]">
                                <span class="font-bold">100</span>
                                <button>+</button>
                            </div>
                        </div>
                        <div class="swiper-slide flex flex-col gap-[10px]">
                            <div class="h-full border border-lightGray">
                                <img class="w-full h-full object-contain" src="<?php echo get_template_directory_uri(); ?>/imgs/popular-p-3.png" alt="" />
                            </div>

                            <div>
                                <span class="text-[16px]">
                                    Лапша органическая рисовая Коричневый рис BIO, Perfect Earth, 225г Таиланд
                                </span>
                            </div>

                            <div class="w-[129px] bg-lightGray p-[5px]">
                                <span class="font-bold">100</span>
                                <button>+</button>
                            </div>
                        </div>
                        <div class="swiper-slide flex flex-col gap-[10px]">
                            <div class="h-full border border-lightGray">
                                <img class="w-full h-full object-contain" src="<?php echo get_template_directory_uri(); ?>/imgs/popular-p-1.png" alt="" />
                            </div>

                            <div>
                                <span class="text-[16px]">
                                    Лапша органическая рисовая Коричневый рис BIO, Perfect Earth, 225г Таиланд
                                </span>
                            </div>

                            <div class="w-[129px] bg-lightGray p-[5px]">
                                <span class="font-bold">100</span>
                                <button>+</button>
                            </div>
                        </div>
                        <div class="swiper-slide flex flex-col gap-[10px]">
                            <div class="h-full border border-lightGray">
                                <img class="w-full h-full object-contain" src="<?php echo get_template_directory_uri(); ?>/imgs/popular-p-2.png" alt="" />
                            </div>

                            <div>
                                <span class="text-[16px]">
                                    Лапша органическая рисовая Коричневый рис BIO, Perfect Earth, 225г Таиланд
                                </span>
                            </div>

                            <div class="w-[129px] bg-lightGray p-[5px]">
                                <span class="font-bold">100</span>
                                <button>+</button>
                            </div>
                        </div>
                        <div class="swiper-slide flex flex-col gap-[10px]">
                            <div class="h-full border border-lightGray">
                                <img class="w-full h-full object-contain" src="<?php echo get_template_directory_uri(); ?>/imgs/popular-p-3.png" alt="" />
                            </div>

                            <div>
                                <span class="text-[16px]">
                                    Лапша органическая рисовая Коричневый рис BIO, Perfect Earth, 225г Таиланд
                                </span>
                            </div>

                            <div class="w-[129px] bg-lightGray p-[5px]">
                                <span class="font-bold">100</span>
                                <button>+</button>
                            </div>
                        </div>
                        <div class="swiper-slide flex flex-col gap-[10px]">
                            <div class="h-full border border-lightGray">
                                <img class="w-full h-full object-contain" src="<?php echo get_template_directory_uri(); ?>/imgs/popular-p-1.png" alt="" />
                            </div>

                            <div>
                                <span class="text-[16px]">
                                    Лапша органическая рисовая Коричневый рис BIO, Perfect Earth, 225г Таиланд
                                </span>
                            </div>

                            <div class="w-[129px] bg-lightGray p-[5px]">
                                <span class="font-bold">100</span>
                                <button>+</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="promotion">
        <div class="container relative">

            <div class="flex justify-between md:items-center items-start md:flex-row flex-col gap-[20px] md:pb-[40px] pb-[30px]">
                <div>
                    <h2 class="font-bold md:text-[55px] text-[28px] uppercase">
                        Акции и скидки
                    </h2>
                </div>

                <div class="border py-[10px] px-[20px]">
                    <button type="button" class="flex items-center justify-center gap-[10px]">

                        <span class="uppercase">
                            Больше
                        </span>

                        <svg width="24" height="16" viewBox="0 0 24 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M23.7071 8.70711C24.0976 8.31658 24.0976 7.68342 23.7071 7.29289L17.3431 0.928932C16.9526 0.538408 16.3195 0.538408 15.9289 0.928932C15.5384 1.31946 15.5384 1.95262 15.9289 2.34315L21.5858 8L15.9289 13.6569C15.5384 14.0474 15.5384 14.6805 15.9289 15.0711C16.3195 15.4616 16.9526 15.4616 17.3431 15.0711L23.7071 8.70711ZM0 9H23V7H0V9Z" fill="#262626" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="flex justify-between items-center w-full absolute top-[233px] z-[10]">
                <div class="swiper-promotion-prev">
                    <button class="relative right-[20px]">
                        <svg width="55" height="55" viewBox="0 0 55 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="27.5" cy="27.5" r="27.5" transform="matrix(-1 0 0 1 55 0)" fill="#262626" />
                            <path d="M15.2929 27.7071C14.9024 27.3166 14.9024 26.6834 15.2929 26.2929L21.6569 19.9289C22.0474 19.5384 22.6805 19.5384 23.0711 19.9289C23.4616 20.3195 23.4616 20.9526 23.0711 21.3431L17.4142 27L23.0711 32.6569C23.4616 33.0474 23.4616 33.6805 23.0711 34.0711C22.6805 34.4616 22.0474 34.4616 21.6569 34.0711L15.2929 27.7071ZM40 28L16 28L16 26L40 26L40 28Z" fill="white" />
                        </svg>
                    </button>
                </div>

                <div class="swiper-promotion-next">
                    <button class="relative -left-[20px]">
                        <svg width="55" height="55" viewBox="0 0 55 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="27.5" cy="27.5" r="27.5" fill="#262626" />
                            <path d="M39.7071 27.7071C40.0976 27.3166 40.0976 26.6834 39.7071 26.2929L33.3431 19.9289C32.9526 19.5384 32.3195 19.5384 31.9289 19.9289C31.5384 20.3195 31.5384 20.9526 31.9289 21.3431L37.5858 27L31.9289 32.6569C31.5384 33.0474 31.5384 33.6805 31.9289 34.0711C32.3195 34.4616 32.9526 34.4616 33.3431 34.0711L39.7071 27.7071ZM15 28L39 28L39 26L15 26L15 28Z" fill="white" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="swiper-promotion overflow-hidden relative">
                <div class="promotion-item relative py-[40px]">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide flex flex-col gap-[10px] relative">
                            <div class="h-full bg-white">
                                <img class="w-full h-full object-contain" src="<?php echo get_template_directory_uri(); ?>/imgs/popular-p-1.png" alt="" />
                                <div class="absolute top-[10px] left-[10px] bg-defaultBlack p-[5px] rounded-[6px]">
                                    <div class="flex items-center justify-center gap-[5px]">
                                        <span class="text-white"> — 25 %</span>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <span class="text-[16px]">
                                    Лапша органическая рисовая Коричневый рис BIO, Perfect Earth, 225г Таиланд
                                </span>
                            </div>

                            <div class="w-[129px] bg-lightGray p-[5px]">
                                <span class="font-bold">100</span>
                                <button>+</button>
                            </div>
                        </div>
                        <div class="swiper-slide flex flex-col gap-[10px] relative">
                            <div class="h-full bg-white">
                                <img class="w-full h-full object-contain" src="<?php echo get_template_directory_uri(); ?>/imgs/popular-p-2.png" alt="" />
                                <div class="absolute top-[10px] left-[10px] bg-defaultBlack p-[5px] rounded-[6px]">
                                    <div class="flex items-center justify-center gap-[5px]">
                                        <span class="text-white"> — 25 %</span>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <span class="text-[16px]">
                                    Лапша органическая рисовая Коричневый рис BIO, Perfect Earth, 225г Таиланд
                                </span>
                            </div>

                            <div class="w-[129px] bg-lightGray p-[5px]">
                                <span class="font-bold">100</span>
                                <button>+</button>
                            </div>
                        </div>
                        <div class="swiper-slide flex flex-col gap-[10px] relative">
                            <div class="h-full bg-white">
                                <img class="w-full h-full object-contain" src="<?php echo get_template_directory_uri(); ?>/imgs/popular-p-3.png" alt="" />
                                <div class="absolute top-[10px] left-[10px] bg-defaultBlack p-[5px] rounded-[6px]">
                                    <div class="flex items-center justify-center gap-[5px]">
                                        <span class="text-white"> — 25 %</span>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <span class="text-[16px]">
                                    Лапша органическая рисовая Коричневый рис BIO, Perfect Earth, 225г Таиланд
                                </span>
                            </div>

                            <div class="w-[129px] bg-lightGray p-[5px]">
                                <span class="font-bold">100</span>
                                <button>+</button>
                            </div>
                        </div>
                        <div class="swiper-slide flex flex-col gap-[10px] relative">
                            <div class="h-full bg-white">
                                <img class="w-full h-full object-contain" src="<?php echo get_template_directory_uri(); ?>/imgs/popular-p-1.png" alt="" />
                                <div class="absolute top-[10px] left-[10px] bg-defaultBlack p-[5px] rounded-[6px]">
                                    <div class="flex items-center justify-center gap-[5px]">
                                        <span class="text-white"> — 25 %</span>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <span class="text-[16px]">
                                    Лапша органическая рисовая Коричневый рис BIO, Perfect Earth, 225г Таиланд
                                </span>
                            </div>

                            <div class="w-[129px] bg-lightGray p-[5px]">
                                <span class="font-bold">100</span>
                                <button>+</button>
                            </div>
                        </div>
                        <div class="swiper-slide flex flex-col gap-[10px] relative">
                            <div class="h-full bg-white">
                                <img class="w-full h-full object-contain" src="<?php echo get_template_directory_uri(); ?>/imgs/popular-p-2.png" alt="" />
                                <div class="absolute top-[10px] left-[10px] bg-defaultBlack p-[5px] rounded-[6px]">
                                    <div class="flex items-center justify-center gap-[5px]">
                                        <span class="text-white"> — 25 %</span>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <span class="text-[16px]">
                                    Лапша органическая рисовая Коричневый рис BIO, Perfect Earth, 225г Таиланд
                                </span>
                            </div>

                            <div class="w-[129px] bg-lightGray p-[5px]">
                                <span class="font-bold">100</span>
                                <button>+</button>
                            </div>
                        </div>
                        <div class="swiper-slide flex flex-col gap-[10px] relative">
                            <div class="h-full bg-white">
                                <img class="w-full h-full object-contain" src="<?php echo get_template_directory_uri(); ?>/imgs/popular-p-3.png" alt="" />
                                <div class="absolute top-[10px] left-[10px] bg-defaultBlack p-[5px] rounded-[6px]">
                                    <div class="flex items-center justify-center gap-[5px]">
                                        <span class="text-white"> — 25 %</span>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <span class="text-[16px]">
                                    Лапша органическая рисовая Коричневый рис BIO, Perfect Earth, 225г Таиланд
                                </span>
                            </div>

                            <div class="w-[129px] bg-lightGray p-[5px]">
                                <span class="font-bold">100</span>
                                <button>+</button>
                            </div>
                        </div>
                        <div class="swiper-slide flex flex-col gap-[10px] relative">
                            <div class="h-full bg-white">
                                <img class="w-full h-full object-contain" src="<?php echo get_template_directory_uri(); ?>/imgs/popular-p-1.png" alt="" />
                                <div class="absolute top-[10px] left-[10px] bg-defaultBlack p-[5px] rounded-[6px]">
                                    <div class="flex items-center justify-center gap-[5px]">
                                        <span class="text-white"> — 25 %</span>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <span class="text-[16px]">
                                    Лапша органическая рисовая Коричневый рис BIO, Perfect Earth, 225г Таиланд
                                </span>
                            </div>

                            <div class="w-[129px] bg-lightGray p-[5px]">
                                <span class="font-bold">100</span>
                                <button>+</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section id="recipes" data-scroll>
        <div class="container relative">

            <div class="flex justify-between md:items-center items-start md:flex-row flex-col gap-[20px] md:pb-[40px] pb-[30px]">
                <div>
                    <h2 class="font-bold md:text-[55px] text-[28px] uppercase">
                        Рецепты
                    </h2>
                </div>

                <div class="border py-[10px] px-[20px]">
                    <button type="button" class="flex items-center justify-center gap-[10px]">

                        <span class="uppercase">
                            Больше
                        </span>

                        <svg width="24" height="16" viewBox="0 0 24 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M23.7071 8.70711C24.0976 8.31658 24.0976 7.68342 23.7071 7.29289L17.3431 0.928932C16.9526 0.538408 16.3195 0.538408 15.9289 0.928932C15.5384 1.31946 15.5384 1.95262 15.9289 2.34315L21.5858 8L15.9289 13.6569C15.5384 14.0474 15.5384 14.6805 15.9289 15.0711C16.3195 15.4616 16.9526 15.4616 17.3431 15.0711L23.7071 8.70711ZM0 9H23V7H0V9Z" fill="#262626" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="flex justify-between items-center w-full absolute top-[233px] z-[10]">
                <div class="swiper-recipe-prev">
                    <button class="relative right-[20px]">
                        <svg width="55" height="55" viewBox="0 0 55 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="27.5" cy="27.5" r="27.5" transform="matrix(-1 0 0 1 55 0)" fill="#262626" />
                            <path d="M15.2929 27.7071C14.9024 27.3166 14.9024 26.6834 15.2929 26.2929L21.6569 19.9289C22.0474 19.5384 22.6805 19.5384 23.0711 19.9289C23.4616 20.3195 23.4616 20.9526 23.0711 21.3431L17.4142 27L23.0711 32.6569C23.4616 33.0474 23.4616 33.6805 23.0711 34.0711C22.6805 34.4616 22.0474 34.4616 21.6569 34.0711L15.2929 27.7071ZM40 28L16 28L16 26L40 26L40 28Z" fill="white" />
                        </svg>
                    </button>
                </div>

                <div class="swiper-recipe-next">
                    <button class="relative -left-[20px]">
                        <svg width="55" height="55" viewBox="0 0 55 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="27.5" cy="27.5" r="27.5" fill="#262626" />
                            <path d="M39.7071 27.7071C40.0976 27.3166 40.0976 26.6834 39.7071 26.2929L33.3431 19.9289C32.9526 19.5384 32.3195 19.5384 31.9289 19.9289C31.5384 20.3195 31.5384 20.9526 31.9289 21.3431L37.5858 27L31.9289 32.6569C31.5384 33.0474 31.5384 33.6805 31.9289 34.0711C32.3195 34.4616 32.9526 34.4616 33.3431 34.0711L39.7071 27.7071ZM15 28L39 28L39 26L15 26L15 28Z" fill="white" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="swiper-recipe overflow-hidden relative">
                <div class="recipe-item relative">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide flex flex-col gap-[10px]">
                            <div class="h-full">
                                <img class="w-full h-full object-contain" src="<?php echo get_template_directory_uri(); ?>/imgs/recipe-1.png" alt="" />
                            </div>
                            <div class="absolute top-[10px] left-[10px] bg-defaultBlack p-[5px] rounded-[6px]">
                                <div class="flex items-center justify-center gap-[5px]">
                                    <img src="<?php echo get_template_directory_uri(); ?>/imgs/clock.svg" alt="">
                                    <span class="text-white">25 минут</span>
                                </div>
                            </div>
                            <div>
                                <span class="text-[16px]">
                                    Домашние котлеты
                                </span>
                            </div>
                        </div>
                        <div class="swiper-slide flex flex-col gap-[10px]">
                            <div class="h-full">
                                <img class="w-full h-full object-contain" src="<?php echo get_template_directory_uri(); ?>/imgs/recipe-2.png" alt="" />
                            </div>
                            <div class="absolute top-[10px] left-[10px] bg-defaultBlack p-[5px] rounded-[6px]">
                                <div class="flex items-center justify-center gap-[5px]">
                                    <img src="<?php echo get_template_directory_uri(); ?>/imgs/clock.svg" alt="">
                                    <span class="text-white">25 минут</span>
                                </div>
                            </div>
                            <div>
                                <span class="text-[16px]">
                                    Кабачковые оладьи
                                </span>
                            </div>
                        </div>
                        <div class="swiper-slide flex flex-col gap-[10px]">
                            <div class="h-full">
                                <img class="w-full h-full object-contain" src="<?php echo get_template_directory_uri(); ?>/imgs/recipe-3.png" alt="" />
                            </div>
                            <div class="absolute top-[10px] left-[10px] bg-defaultBlack p-[5px] rounded-[6px]">
                                <div class="flex items-center justify-center gap-[5px]">
                                    <img src="<?php echo get_template_directory_uri(); ?>/imgs/clock.svg" alt="">
                                    <span class="text-white">25 минут</span>
                                </div>
                            </div>
                            <div>
                                <span class="text-[16px]">
                                    Фаршированные перцы
                                </span>
                            </div>
                        </div>
                        <div class="swiper-slide flex flex-col gap-[10px]">
                            <div class="h-full">
                                <img class="w-full h-full object-contain" src="<?php echo get_template_directory_uri(); ?>/imgs/recipe-1.png" alt="" />
                            </div>
                            <div class="absolute top-[10px] left-[10px] bg-defaultBlack p-[5px] rounded-[6px]">
                                <div class="flex items-center justify-center gap-[5px]">
                                    <img src="<?php echo get_template_directory_uri(); ?>/imgs/clock.svg" alt="">
                                    <span class="text-white">25 минут</span>
                                </div>
                            </div>
                            <div>
                                <span class="text-[16px]">
                                    Домашние котлеты
                                </span>
                            </div>
                        </div>
                        <div class="swiper-slide flex flex-col gap-[10px]">
                            <div class="h-full">
                                <img class="w-full h-full object-contain" src="<?php echo get_template_directory_uri(); ?>/imgs/recipe-2.png" alt="" />
                            </div>
                            <div class="absolute top-[10px] left-[10px] bg-defaultBlack p-[5px] rounded-[6px]">
                                <div class="flex items-center justify-center gap-[5px]">
                                    <img src="<?php echo get_template_directory_uri(); ?>/imgs/clock.svg" alt="">
                                    <span class="text-white">25 минут</span>
                                </div>
                            </div>
                            <div>
                                <span class="text-[16px]">
                                    Кабачковые оладьи
                                </span>
                            </div>
                        </div>
                        <div class="swiper-slide flex flex-col gap-[10px]">
                            <div class="h-full">
                                <img class="w-full h-full object-contain" src="<?php echo get_template_directory_uri(); ?>/imgs/recipe-3.png" alt="" />
                            </div>
                            <div class="absolute top-[10px] left-[10px] bg-defaultBlack p-[5px] rounded-[6px]">
                                <div class="flex items-center justify-center gap-[5px]">
                                    <img src="<?php echo get_template_directory_uri(); ?>/imgs/clock.svg" alt="">
                                    <span class="text-white">25 минут</span>
                                </div>
                            </div>
                            <div>
                                <span class="text-[16px]">
                                    Фаршированные перцы
                                </span>
                            </div>
                        </div>
                        <div class="swiper-slide flex flex-col gap-[10px]">
                            <div class="h-full">
                                <img class="w-full h-full object-contain" src="<?php echo get_template_directory_uri(); ?>/imgs/recipe-1.png" alt="" />
                            </div>
                            <div class="absolute top-[10px] left-[10px] bg-defaultBlack p-[5px] rounded-[6px]">
                                <div class="flex items-center justify-center gap-[5px]">
                                    <img src="<?php echo get_template_directory_uri(); ?>/imgs/clock.svg" alt="">
                                    <span class="text-white">25 минут</span>
                                </div>
                            </div>
                            <div>
                                <span class="text-[16px]">
                                    Домашние котлеты
                                </span>
                            </div>
                        </div>
                        <div class="swiper-slide flex flex-col gap-[10px]">
                            <div class="h-full">
                                <img class="w-full h-full object-contain" src="<?php echo get_template_directory_uri(); ?>/imgs/recipe-2.png" alt="" />
                            </div>
                            <div class="absolute top-[10px] left-[10px] bg-defaultBlack p-[5px] rounded-[6px]">
                                <div class="flex items-center justify-center gap-[5px]">
                                    <img src="<?php echo get_template_directory_uri(); ?>/imgs/clock.svg" alt="">
                                    <span class="text-white">25 минут</span>
                                </div>
                            </div>
                            <div>
                                <span class="text-[16px]">
                                    Кабачковые оладьи
                                </span>
                            </div>
                        </div>
                        <div class="swiper-slide flex flex-col gap-[10px]">
                            <div class="h-full">
                                <img class="w-full h-full object-contain" src="<?php echo get_template_directory_uri(); ?>/imgs/recipe-3.png" alt="" />
                            </div>
                            <div class="absolute top-[10px] left-[10px] bg-defaultBlack p-[5px] rounded-[6px]">
                                <div class="flex items-center justify-center gap-[5px]">
                                    <img src="<?php echo get_template_directory_uri(); ?>/imgs/clock.svg" alt="">
                                    <span class="text-white">25 минут</span>
                                </div>
                            </div>
                            <div>
                                <span class="text-[16px]">
                                    Фаршированные перцы
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <section id="category-1" data-scroll>
        <div class="container relative">
            <h2 class="font-bold md:text-[55px] text-[28px] uppercase">

                <?php

                ?>
                Молоко, яйца, сыр
            </h2>

            <div class="grid md:grid-cols-4 grid-cols-2 gap-[20px] pt-[40px]">
                <a href="">

                    <div class="flex flex-col gap-[10px]">
                        <div class="hover__img--wrapper w-full max-h-[300px] h-full">
                            <img class="hover__img w-full h-full object-cover" src="<?php echo get_template_directory_uri(); ?>/imgs/category-1-1.png" />
                        </div>

                        <div>
                            <span>
                                Молочное и яйца
                            </span>
                        </div>
                    </div>
                </a>
                <a href="">
                    <div class="flex flex-col gap-[10px]">
                        <div class="hover__img--wrapper w-full max-h-[300px] h-full">
                            <img class="hover__img w-full h-full object-cover" src="<?php echo get_template_directory_uri(); ?>/imgs/category-1-2.png" />
                        </div>

                        <div>
                            <span>
                                Йогурты и десерты
                            </span>
                        </div>
                    </div>
                </a>
                <a href="">

                    <div class="flex flex-col gap-[10px]">
                        <div class="hover__img--wrapper w-full max-h-[300px] h-full">
                            <img class="hover__img w-full h-full object-cover" src="<?php echo get_template_directory_uri(); ?>/imgs/category-1-3.png" />
                        </div>

                        <div>
                            <span>
                                Сыр
                            </span>
                        </div>
                    </div>
                </a>
            </div>


        </div>

    </section>



    <section id="category-2">
        <div class="container relative">
            <h2 class="font-bold md:text-[55px] text-[28px] uppercase">
                Бакалея
            </h2>

            <div class="grid md:grid-cols-4 grid-cols-2 gap-[20px] pt-[40px]">
                <div class="flex flex-col gap-[10px]">
                    <div class="hover__img--wrapper w-full max-h-[300px] h-full">
                        <img class="hover__img w-full h-full object-cover" src="<?php echo get_template_directory_uri(); ?>/imgs/category-1-1.png" />
                    </div>

                    <div>
                        <span>
                            Макароны, крупы и мука
                        </span>
                    </div>
                </div>
                <div class="flex flex-col gap-[10px]">
                    <div class="hover__img--wrapper w-full max-h-[300px] h-full">
                        <img class="hover__img w-full h-full object-cover" src="<?php echo get_template_directory_uri(); ?>/imgs/category-1-2.png" />
                    </div>

                    <div>
                        <span>
                            Мюсли и завтраки
                        </span>
                    </div>
                </div>
                <div class="flex flex-col gap-[10px]">
                    <div class="hover__img--wrapper w-full max-h-[300px] h-full">
                        <img class="hover__img w-full h-full object-cover" src="<?php echo get_template_directory_uri(); ?>/imgs/category-1-3.png" />
                    </div>

                    <div>
                        <span>
                            Кофе и какао
                        </span>
                    </div>
                </div>
            </div>


        </div>

    </section>


    <section id="category-3" data-scroll>
        <div class="container relative">
            <h2 class="font-bold md:text-[55px] text-[28px] uppercase">
                Вода и напитки
            </h2>

            <div class="grid md:grid-cols-4 grid-cols-2 gap-[20px] pt-[40px]">
                <div class="flex flex-col gap-[10px]">
                    <div class="hover__img--wrapper w-full max-h-[300px] h-full">
                        <img class="hover__img w-full h-full object-cover" src="<?php echo get_template_directory_uri(); ?>/imgs/category-1-1.png" />
                    </div>

                    <div>
                        <span>
                            Вода
                        </span>
                    </div>
                </div>
                <div class="flex flex-col gap-[10px]">
                    <div class="hover__img--wrapper w-full max-h-[300px] h-full">
                        <img class="hover__img w-full h-full object-cover" src="<?php echo get_template_directory_uri(); ?>/imgs/category-1-2.png" />
                    </div>

                    <div>
                        <span>
                            Соки и морсы
                        </span>
                    </div>
                </div>
                <div class="flex flex-col gap-[10px]">
                    <div class="hover__img--wrapper w-full max-h-[300px] h-full">
                        <img class="hover__img w-full h-full object-cover" src="<?php echo get_template_directory_uri(); ?>/imgs/category-1-3.png" />
                    </div>

                    <div>
                        <span>
                            Холодный чай
                        </span>
                    </div>
                </div>
            </div>


        </div>

    </section>

    <section id="category-4" data-scroll>
        <div class="container relative">
            <h2 class="font-bold md:text-[55px] text-[28px] uppercase">
                Сладкое
            </h2>

            <div class="grid md:grid-cols-4 grid-cols-2 gap-[20px] pt-[40px]">
                <div class="flex flex-col gap-[10px]">
                    <div class="hover__img--wrapper w-full max-h-[300px] h-full">
                        <img class="hover__img w-full h-full object-cover" src="<?php echo get_template_directory_uri(); ?>/imgs/category-1-1.png" />
                    </div>

                    <div>
                        <span>
                            Мороженое
                        </span>
                    </div>
                </div>
                <div class="flex flex-col gap-[10px]">
                    <div class="hover__img--wrapper w-full max-h-[300px] h-full">
                        <img class="hover__img w-full h-full object-cover" src="<?php echo get_template_directory_uri(); ?>/imgs/category-1-2.png" />
                    </div>

                    <div>
                        <span>
                            Шоколад и конфеты
                        </span>
                    </div>
                </div>
                <div class="flex flex-col gap-[10px]">
                    <div class="hover__img--wrapper w-full max-h-[300px] h-full">
                        <img class="hover__img w-full h-full object-cover" src="<?php echo get_template_directory_uri(); ?>/imgs/category-1-3.png" />
                    </div>

                    <div>
                        <span>
                            Драже и мармелад
                        </span>
                    </div>
                </div>
                <div class="flex flex-col gap-[10px]">
                    <div class="hover__img--wrapper w-full max-h-[300px] h-full">
                        <img class="hover__img w-full h-full object-cover" src="<?php echo get_template_directory_uri(); ?>/imgs/category-1-3.png" />
                    </div>

                    <div>
                        <span>
                            Торты, вафли и печенье
                        </span>
                    </div>
                </div>
            </div>


        </div>

    </section>


</main>


<?php get_footer(); ?>