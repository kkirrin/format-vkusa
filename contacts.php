<?php
/*
    Template Name: контакты
    */
?>

<?php get_header(); ?>


<main>

    <section id="order">
        <div class="container relative">

            <div>
                <ul class="flex gap-[10px]">
                    <li class=" text-darkGray">
                        <a href="/">
                            Главная
                        </a>
                    </li>

                    <li class=" text-darkGray">
                        —
                    </li>

                    <li class="breadcrumb__item">
                        <span class=" text-darkGray">Контакты</span>
                    </li>
                </ul>
            </div>


            <div class="py-[10px]">
                <h2 class="font-bold md:text-[55px] text-[28px] uppercase">
                    Контакты
                </h2>
            </div>

            <div class="w-full flex md:flex-row flex-col gap-[50px]">
                <div>
                    <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Aba3db466796bacc28218ba02da75eaf5e1a8e3f2c9c46c200ee9903b7332ad00&amp;width=900&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script>
                </div>
                <div class="grid md:grid-cols-2 gap-[30px]">
                    <ul>
                        <p>Реквизиты</p>
                        <li>ООО «.....»</li>
                        <li>ИНН 000 000 000</li>
                        <li>КПП 000 000 000</li>
                        <li></li>
                    </ul>

                    <ul>
                        <p>Телефоны</p>
                        <li>+7 999 999 99 99</li>
                        <li>+7 999 999 99 99</li>
                    </ul>

                    <ul>
                        <p>Электронная почта</p>
                        <li>inbox@gmail.com</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

</main>


<?php get_footer(); ?>