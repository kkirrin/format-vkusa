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
      menuButton.classList.remove("active");
      menu.classList.remove("is-active");
      body.classList.remove("lock");
    });
  });
  mobileMenuButton.addEventListener("click", (evt) => {
    mobileMenuButton.classList.toggle("active");
    mobileMenu.classList.toggle("is-active");
    body.classList.toggle("lock");
  });
  menuLinks.forEach((link) => {
    link.addEventListener("click", (evt) => {
      menuButton.classList.remove("active");
      menu.classList.remove("is-active");
      body.classList.remove("lock");
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
      if (modalContent.classList.contains("is-active")) {
        return;
      } else {
        modalContent.classList.add("is-active");
        mask.classList.add("is-active");
      }
    });
  });
  document.addEventListener("click", (event) => {
    if (!event.target.closest(".modal") && !event.target.closest(".modal_btn")) {
      const modalContent = document.querySelectorAll(".modal_content");
      modalContent.forEach((content) => {
        content.classList.remove("is-active");
      });
      mask.classList.remove("is-active");
    }
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
const initHeaderFix = () => {
  const header = document.querySelector("header .fixed");
  const clearDiv = document.querySelector("header .able");
  window.addEventListener("scroll", () => {
    let scrollTop = window.scrollY;
    if (scrollTop >= 50) {
      header.classList.add("header-fix");
      clearDiv.classList.add("disabled");
    } else {
      header.classList.remove("header-fix");
      clearDiv.classList.remove("disabled");
    }
  });
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
window.addEventListener("DOMContentLoaded", () => {
  console.log("подключен скрипт main.js");
  init();
  initNav();
  initTabs();
  initModal();
  initPopup();
  initSlider();
  initHeaderFix();
  initPopularSlider();
  initRecipesSlider();
  initPromotionSlider();
});
