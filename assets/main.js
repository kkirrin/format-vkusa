(function polyfill() {
  const relList = document.createElement("link").relList;
  if (relList && relList.supports && relList.supports("modulepreload")) {
    return;
  }
  for (const link of document.querySelectorAll('link[rel="modulepreload"]')) {
    processPreload(link);
  }
  new MutationObserver((mutations) => {
    for (const mutation of mutations) {
      if (mutation.type !== "childList") {
        continue;
      }
      for (const node of mutation.addedNodes) {
        if (node.tagName === "LINK" && node.rel === "modulepreload")
          processPreload(node);
      }
    }
  }).observe(document, { childList: true, subtree: true });
  function getFetchOpts(link) {
    const fetchOpts = {};
    if (link.integrity) fetchOpts.integrity = link.integrity;
    if (link.referrerPolicy) fetchOpts.referrerPolicy = link.referrerPolicy;
    if (link.crossOrigin === "use-credentials")
      fetchOpts.credentials = "include";
    else if (link.crossOrigin === "anonymous") fetchOpts.credentials = "omit";
    else fetchOpts.credentials = "same-origin";
    return fetchOpts;
  }
  function processPreload(link) {
    if (link.ep)
      return;
    link.ep = true;
    const fetchOpts = getFetchOpts(link);
    fetch(link.href, fetchOpts);
  }
})();
const init = () => {
  console.log("its a live!!!!!!!!!!!!");
};
const initNav = () => {
  const body = document.querySelector("body");
  const menu = document.querySelector(".menu");
  const menuButton = document.querySelector(".btn__menu");
  const mobileMenu = document.querySelector(".mobile-menu");
  const mobileMenuButton = document.querySelector(".btn__menu--mobile");
  const mobileMenuCloseButton = document.querySelector(".btn__menu--close");
  const mobileMenuLinks = document.querySelectorAll(".mobile-menu a");
  const menuLinks = document.querySelectorAll(".menu a");
  menuButton.addEventListener("click", (e) => {
    menuButton.classList.toggle("active");
    menu.classList.toggle("is-active");
    console.log("клик");
  });
  mobileMenuLinks.forEach((link) => {
    link.addEventListener("click", (evt) => {
      evt.preventDefault();
      menuButton.classList.remove("active");
      menu.classList.remove("is-active");
      body.classList.remove("lock");
    });
  });
  mobileMenuButton.addEventListener("click", (evt) => {
    evt.preventDefault();
    mobileMenuButton.classList.toggle("active");
    mobileMenu.classList.toggle("is-active");
    body.classList.toggle("lock");
  });
  menuLinks.forEach((link) => {
    link.addEventListener("click", (evt) => {
      
      // menuButton.classList.remove("active");
      // menu.classList.remove("is-active");
      // body.classList.remove("lock");
    });
  });
  mobileMenuCloseButton.addEventListener("click", (evt) => {
    mobileMenuButton.classList.remove("active");
    mobileMenu.classList.remove("is-active");
    body.classList.remove("lock");
  });
};
const initTabs = () => {
  const tab_btn = document.querySelectorAll(".tab_btn");
  const tab_content = document.querySelectorAll(".tab-content");
  console.log(tab_btn);
  if (tab_btn.length > 0 && tab_content.length > 0) {
    tab_btn[0].classList.add("active");
    tab_content[0].classList.add("active");
    tab_btn.forEach((btn) => {
      btn.addEventListener("click", (e) => {
        const current_btn = e.currentTarget;
        const current_btn_id = current_btn.dataset.targetId;
        const matching_tab_content = Array.from(tab_content).find(
          (content) => content.dataset.id === current_btn_id
        );
        if (current_btn.classList.contains("active")) {
          return;
        } else {
          tab_btn.forEach((b) => b.classList.remove("active"));
          tab_content.forEach((c) => c.classList.remove("active"));
          current_btn.classList.add("active");
          matching_tab_content.classList.add("active");
        }
      });
    });
  }
};
const initModal = () => {
  const modalButtons = document.querySelectorAll(".modal_btn");
  const body = document.querySelector("body");
  const mask = body.querySelector(".mask");
  modalButtons.forEach((btn) => {
    btn.addEventListener("click", (e) => {
      const currentBtn = e.currentTarget;
      const modalWrapper = currentBtn.closest(".modal_wrapper");
      const modalContent = modalWrapper.querySelector(".modal_content");
      const modalClose = modalContent.querySelector(".btn_close");
      if (modalContent.classList.contains("is-active")) {
        return;
      } else {
        modalContent.classList.add("is-active");
        mask.classList.add("is-active");
      }
      modalClose.addEventListener('click', (e) => { 
        modalContent.classList.remove("is-active");
        mask.classList.remove("is-active");
      })
      mask.addEventListener('click', (e) => { 
        modalContent.classList.remove("is-active");
        mask.classList.remove("is-active");
      });
    });
  });
};
const initPopup = () => {
  const popupLinks = document.querySelectorAll(".popup-link");
  console.log(popupLinks);
  const body = document.querySelector("body");
  const lockPadding = document.querySelectorAll(".lock-padding");
  let unlock = true;
  const timeout = 800;
  if (popupLinks.length > 0) {
    for (let index = 0; index < popupLinks.length; index++) {
      const popupLink = popupLinks[index];
      popupLink.addEventListener("click", function(e) {
        const popupName = popupLink.getAttribute("href").replace("#", "");
        const curentPopup = document.getElementById(popupName);
        popupOpen(curentPopup);
        e.preventDefault();
      });
    }
  }
  const popupCloseIcon = document.querySelectorAll(".close-popup");
  if (popupCloseIcon.length > 0) {
    for (let index = 0; index < popupCloseIcon.length; index++) {
      const el = popupCloseIcon[index];
      el.addEventListener("click", function(e) {
        popupClose(el.closest(".popup"));
        e.preventDefault();
      });
    }
  }
  function popupOpen(curentPopup) {
    if (curentPopup && unlock) {
      const popupActive = document.querySelector(".popup.open");
      if (popupActive) {
        popupClose(popupActive, false);
      } else {
        bodyLock();
      }
      curentPopup.classList.add("open");
      curentPopup.addEventListener("click", function(e) {
        if (!e.target.closest(".popup__content")) {
          popupClose(e.target.closest(".popup"));
        }
      });
    }
  }
  function popupClose(popupActive, doUnlock = true) {
    if (unlock) {
      popupActive.classList.remove("open");
      if (doUnlock) {
        bodyUnLock();
      }
    }
  }
  function bodyLock() {
    const lockPaddingValue = window.innerWidth - document.querySelector(".wrapper").offsetWidth + "px";
    if (lockPadding.length > 0) {
      for (let index = 0; index < lockPadding.length; index++) {
        const el = lockPadding[index];
        el.style.paddingRight = lockPaddingValue;
      }
    }
    body.style.paddingRight = lockPaddingValue;
    body.classList.add("lock");
    unlock = false;
    setTimeout(function() {
      unlock = true;
    }, timeout);
  }
  function bodyUnLock() {
    setTimeout(function() {
      if (lockPadding.length > 0) {
        for (let index = 0; index < lockPadding.length; index++) {
          const el = lockPadding[index];
          el.style.paddingRight = "0px";
        }
      }
      body.style.paddingRight = "0px";
      body.classList.remove("lock");
    }, timeout);
    unlock = false;
    setTimeout(function() {
      unlock = true;
    }, timeout);
  }
  document.addEventListener("keydown", function(e) {
    if (e.which === 27) {
      const popupActive = document.querySelector(".popup.open");
      popupClose(popupActive);
    }
  });
  (function() {
    if (!Element.prototype.closest) {
      Element.prototype.closest = function(css) {
        var node = this;
        while (node) {
          if (node.matches(css)) return node;
          else node = node.parentElement;
        }
        return null;
      };
    }
  })();
  (function() {
    if (!Element.prototype.matches) {
      Element.prototype.matches = Element.prototype.matchesSelector || Element.prototype.webkitMatchesSelector || Element.prototype.mozMatchesSelector || Element.prototype.msMatchesSelector;
    }
  })();
};
const initSlider = () => {
  const item = document.querySelector(".main-item");
  if (item) {
    new Swiper(item, {
      autoplay: {
        delay: 3e3
      },
      speed: 3e3,
      // effect: "fade",
      // direction: 'vertical',
      spaceBetween: 15,
      slidesPerView: 1,
      equalHeight: true,
      // If we need pagination
      pagination: {
        el: ".swiper-pagination",
        type: "bullets"
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev"
      }
    });
  }
};
const initPopularSlider = () => {
  const item = document.querySelector(".popular-item");
  console.log(item);
  if (item) {
    new Swiper(item, {
      autoplay: {
        delay: 3e3
      },
      speed: 3e3,
      // effect: "fade",
      // direction: 'vertical',
      spaceBetween: 15,
      slidesPerView: 1,
      equalHeight: true,
      // If we need pagination
      pagination: {
        el: ".swiper-pagination",
        type: "bullets"
      },
      navigation: {
        nextEl: ".swiper-popular-next",
        prevEl: ".swiper-popular-prev"
      },
      breakpoints: {
        320: {
          slidesPerView: 2,
          spaceBetween: 15
        },
        695: {
          slidesPerView: 2,
          spaceBetween: 15
        },
        767: {
          slidesPerView: 4,
          spaceBetween: 15
        },
        1200: {
          spaceBetween: 20,
          slidesPerView: 6
        }
      }
    });
  }
};
const initPromotionSlider = () => {
  const item = document.querySelector(".promotion-item");
  console.log(item);
  if (item) {
    new Swiper(item, {
      autoplay: {
        delay: 3e3
      },
      speed: 3e3,
      // effect: "fade",
      // direction: 'vertical',
      spaceBetween: 15,
      slidesPerView: 1,
      equalHeight: true,
      // If we need pagination
      pagination: {
        el: ".swiper-pagination",
        type: "bullets"
      },
      navigation: {
        nextEl: ".swiper-promotion-next",
        prevEl: ".swiper-promotion-prev"
      },
      breakpoints: {
        320: {
          slidesPerView: 2,
          spaceBetween: 15
        },
        695: {
          slidesPerView: 2,
          spaceBetween: 15
        },
        767: {
          slidesPerView: 4,
          spaceBetween: 15
        },
        1200: {
          spaceBetween: 20,
          slidesPerView: 6
        }
      }
    });
  }
};
const initRecipesSlider = () => {
  const item = document.querySelector(".recipe-item");
  console.log(item);
  if (item) {
    new Swiper(item, {
      autoplay: {
        delay: 3e3
      },
      speed: 3e3,
      // effect: "fade",
      // direction: 'vertical',
      spaceBetween: 15,
      slidesPerView: 1,
      equalHeight: true,
      // If we need pagination
      pagination: {
        el: ".swiper-pagination",
        type: "bullets"
      },
      navigation: {
        nextEl: ".swiper-recipe-next",
        prevEl: ".swiper-recipe-prev"
      },
      breakpoints: {
        320: {
          slidesPerView: 2,
          spaceBetween: 15
        },
        695: {
          slidesPerView: 2,
          spaceBetween: 15
        },
        767: {
          slidesPerView: 4,
          spaceBetween: 15
        },
        1200: {
          spaceBetween: 20,
          slidesPerView: 6
        }
      }
    });
  }
};

const initDropdown = () => { 
  const menu_link = document.querySelectorAll('.menu__link');

  menu_link.forEach((el) => {
        const button = el.querySelector('a');
        const content = el.querySelector('ul');
    
      

        button.addEventListener('click', (evt) => {
            if (evt.currentTarget.classList.contains('.active')) {
                evt.currentTarget.classList.remove('.active');
            }
            if (content) { 
                evt.preventDefault();
    
                const currentButton = evt.currentTarget;
                currentButton.classList.toggle('active');
                content.classList.toggle('active');
                
                if (currentButton.classList.contains('active')) {
                    
                    content.style.maxHeight = 'max-content';

                } else {
                    content.style.maxHeight = null;
                }
            }
        });
        
    });
}



//	Функция предварительных действий в живом поиске, перед отправкой данных на сервер
function live_search(e)
{
    //	Получаем текущее поле поиска, которое получило или потеряло фокус
	this_element	= jQuery(e.currentTarget);
	//	Получаем основной блок текущего живого поиска
    this_parent		= jQuery(this_element.parents('.live_search')[0]);

	//	Проверка, совершено получение фокуса или его потеря
    if(e.type == 'focus' || e.type == 'focusin')
    {
        //	Получаем тип живого поиска
		type		= this_element.attr('name');
		//	Получаем блок выпадающего списка в текущем живом поиске
        list		= this_parent.children('.search_list');

		//	Получаем значение поля поиска текущего живого поиска
        value		= this_element.val();
		//	Добавляем в выпадающий список картинку с загрузкой и отображаем его
        list.empty().append('<div class="download"><div style="height: 30px;"></div></div>').show();
        //	Запуск функции поиска данных через 1 секунду
		delayQuery = setTimeout(get_live_search_list, 1000, type, list, value);

		//	Отслеживание нажатия клавишы клавиатуры
        this_element.off('keyup').on('keyup', function(e)
        {
            if(e.which == 38)
            {//	Действия на нажатие на кнопку 'Up'

            }
            else if(e.which == 40)
            {//	Действия на нажатие на кнопку 'Down'

            }
            else if(e.which == 13)
            {//	Действия на нажатие на кнопку 'Enter'
                sendSearch(e);
            }
            else
            {//	Действия на нажатие на остальные кнопки
                if(typeof live_search_ajax !== 'undefined')
                {
                    //	Убиваем выполнение скрипка поиска и обработки данных на сервере, чтобы предотвратить дублирование запросов
					live_search_ajax.abort();
                }

                if(typeof delayQuery !== "undefined")
                {
                    //	Убиваем отсроченый запуск функции поиска данных
					clearTimeout(delayQuery);
                }

				//	Получаем значение поля поиска текущего живого поиска
                value   = this_element.val();

				//	Добавляем в выпадающий список картинку с загрузкой и отображаем его
                list.empty().append('<div class="download"><div style="height: 30px;"></div></div>').show();
				//	Запуск функции поиска данных через 1 секунду
                delayQuery = setTimeout(get_live_search_list, 1000, type, list, value);
            }
        });
    }
    else if(e.type == 'blur' || e.type == 'focusout')
    {
        //	Проверка на потерю фокуса добавлена на всякий случай, если будет нужно
    }
}





//	Функция отправки данных на сервер и обработка ответа сервера
// function get_live_search_list, live-search.js, 
function get_live_search_list(type, list, value = '')
{
    live_search_ajax = jQuery.ajax({
		//	Путь до файла, который будет обрабатывать ajax-запрос (хранится в переменной, созданной WordPress)
		//	сам скрипт лежит в functions.php
        url         : '/wp-admin/admin-ajax.php',
        type        : 'POST',	//	Метод отправки данных
        //	Данные, отправляемые на сервер
		data        : {
			action: 'live_search',	//	Имя action (Не менять!)
            ajax: type,				//	Тип ajax-запроса (получается из имени поля поиска)
            value: value			//	Содержимое поля поиска
        },
        beforeSend  : function()
        {//	Действия непосредственно перед отправкой ajax-запроса

        },
        success     : function(data)
        {//	Действия при успешном завершении скрипта на сервере
            //	Парсим полученные данные в json-массив
			res = JSON.parse(data);
			
			//	Добавляем пункты выпадающего списка в выпадающий список
			list.empty().append(res['list']);
        },
        error       : function(a, b, c)
        {//	Действия при ошибке во время выполнения скрипта на сервере
            //	Вывод текста ошибки в консоль
			console.log(a.responseText);
        },
        dataType    : 'text',
        response    : 'text'
    });
}

function sendSearch(e) {
        e.preventDefault(); 
        let current = jQuery(e.currentTarget);
        let value = current.parents('.live_search').eq(0).find('.search').val();    
        window.location.href = '/?s=' + encodeURIComponent(value); // Передаем запрос в URL
}

//	Функция обработки клика на пункт из выпадающего списка живого поиска
function set_option(e)
{
	//	Получаем пункт списка, на который кликали
	current_option = jQuery(e.currentTarget);

	//	Получаем поле поиска текущего живого поиска
	input_search = current_option.parent().siblings('label').children('input.search');
	//	Получаем поле, в котором хранится значение выбраного пункта в выпадающем списке
	input_value = current_option.parent().siblings('label').children('input.value');
	//	Получаем поле, в котором хранится тип товара выбраного пункта в выпадающем списке
	input_type = current_option.parent().siblings('label').children('input[name*="type"]');
	//	Получаем поле таблицы, в котором хранится статус текущей позиции в таблице
	status_box = current_option.parents('tr').eq(0).children('.status');

	//	Прописываем текст из выбраного пункта списка в поле поиска
	input_search.val(current_option.attr('data-text'));
	//	Прописываем значение выбраного пункта списка в поле, в котором хранится значение текущего поиска
	input_value.val(current_option.attr('data-value'));
	//	Прописываем тип товара выбраного пункта списка в поле
	input_type.val(current_option.attr('data-product'));

	//	Скываем выподающий список
	jQuery('.search_list').hide();
	//	Меняем статус в поле таблицы на "Активен"
	status_box.children('span').removeClass('negative').addClass('positive').text('Активен');
	//	Запоминаем статус в поле формы
	status_box.children('input[name*="status"]').val('1');
}

jQuery(document).on('ready', function() {
    // Обработка нажатия на кнопку поиска
    jQuery('.search_button').on('click', function (e) {
    sendSearch(e);
       
    });
    

    jQuery('body')
        // Отслеживание клика вне блока живого поиска
        .on('click', function(e) {
            // Поиск блока живого поиска среди родителей объекта, по которому совершен клик
            let live_search_box = jQuery(e.target).closest('.live_search');

            if (!live_search_box.length) {
                // Если блока живого поиска нет, значит клик совершен за пределами
                // Скрываем все выпадающие списки всех живых поисков
                jQuery('.search_list').hide();
            }
        })
        // Убиваем отслеживание получения и потери фокуса
        .off('focus blur')
        // Отслеживание получения фокуса в поле живого поиска
        .on('focus', '.live_search input.search', live_search)
        // Отслеживание потери фокуса в поле живого поиска
        .on('blur', '.live_search input.search', live_search)
        // Отслеживание клика на пункт из выпадающего списка живого поиска
        .on('click', '.search_list > .list_option', set_option);
});

window.addEventListener("DOMContentLoaded", () => {
  console.log("подключен скрипт main.js");
  init();
  initNav();
  initTabs();
  initModal();
  initPopup();
  initSlider();
  initDropdown();
  // initHeaderFix();
  // initShowCheckout();
  initPopularSlider();
  initRecipesSlider();
  initPromotionSlider();
});
