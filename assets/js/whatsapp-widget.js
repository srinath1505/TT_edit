// WhatsApp click handler + respond.io stacked above the WhatsApp bubble.
(function () {
  "use strict";

  var RESPOND_IO_Z_INDEX = "9998";
  var REAPPLY_DELAYS_MS = [0, 400, 1200, 3000];

  function getStackGapPx() {
    var raw = getComputedStyle(document.documentElement)
      .getPropertyValue("--widget-stack-gap")
      .trim();
    var n = parseFloat(raw);
    return Number.isFinite(n) ? n : 12;
  }

  function isMobileViewport() {
    return window.matchMedia("(max-width: 768px)").matches;
  }

  function getRespondIoContainer(host) {
    if (!host || !host.shadowRoot) {
      return null;
    }

    var root = host.shadowRoot;
    return (
      root.querySelector(".container.container--fixed") ||
      root.querySelector(".container") ||
      root.querySelector("[class*='container']")
    );
  }

  function getRespondIoOffset() {
    var whatsapp = document.querySelector(".whatsapp-widget");
    if (!whatsapp) {
      var fallbackBottom = isMobileViewport() ? "58px" : "68px";
      var fallbackRight = isMobileViewport() ? "12px" : "16px";
      return { bottom: fallbackBottom, right: fallbackRight };
    }

    var rect = whatsapp.getBoundingClientRect();
    var gap = getStackGapPx();
    var bottom = window.innerHeight - rect.top + gap;
    var right = window.innerWidth - rect.right;

    return {
      bottom: Math.max(0, Math.round(bottom)) + "px",
      right: Math.max(0, Math.round(right)) + "px",
    };
  }

  function positionRespondIoWidget() {
    var host = document.querySelector("respond-io-widget");
    var container = getRespondIoContainer(host);
    if (!container) {
      return false;
    }

    var offset = getRespondIoOffset();
    container.style.setProperty("bottom", offset.bottom, "important");
    container.style.setProperty("right", offset.right, "important");
    container.style.setProperty("z-index", RESPOND_IO_Z_INDEX, "important");
    return true;
  }

  function scheduleReapply() {
    REAPPLY_DELAYS_MS.forEach(function (delay) {
      setTimeout(positionRespondIoWidget, delay);
    });
  }

  var resizeTimer;
  function onLayoutChange() {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(function () {
      positionRespondIoWidget();
    }, 100);
  }

  function watchWhatsAppWidget() {
    var whatsapp = document.querySelector(".whatsapp-widget");
    if (!whatsapp || typeof ResizeObserver === "undefined") {
      return;
    }

    var ro = new ResizeObserver(function () {
      positionRespondIoWidget();
    });
    ro.observe(whatsapp);
  }

  function watchRespondIoWidget() {
    function onPositioned() {
      scheduleReapply();
      watchWhatsAppWidget();
      window.addEventListener("resize", onLayoutChange);
      window.addEventListener("orientationchange", onLayoutChange);
      if (window.visualViewport) {
        window.visualViewport.addEventListener("resize", onLayoutChange);
      }
      var mq = window.matchMedia("(max-width: 768px)");
      if (typeof mq.addEventListener === "function") {
        mq.addEventListener("change", onLayoutChange);
      }
    }

    if (positionRespondIoWidget()) {
      onPositioned();
      return;
    }

    var observer = new MutationObserver(function () {
      if (positionRespondIoWidget()) {
        observer.disconnect();
        onPositioned();
      }
    });

    observer.observe(document.documentElement, {
      childList: true,
      subtree: true,
    });

    setTimeout(function () {
      observer.disconnect();
    }, 20000);
  }

  function initWhatsAppClick() {
    var whatsappBtn = document.querySelector(".whatsapp-button");
    if (!whatsappBtn) {
      return;
    }

    var phoneNumber = "447988536833";

    whatsappBtn.addEventListener("click", function (e) {
      e.preventDefault();

      var greeting =
        window.i18n && typeof window.i18n.t === "function"
          ? window.i18n.t(
              "Hello! Welcome to TraderTok. We are here to help you. What can we do for you today?"
            )
          : "Hello! Welcome to TraderTok. We are here to help you. What can we do for you today?";

      var whatsappUrl =
        "https://wa.me/" + phoneNumber + "?text=" + encodeURIComponent(greeting);
      window.open(whatsappUrl, "_blank");
    });
  }

  function boot() {
    initWhatsAppClick();
    watchRespondIoWidget();
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", boot);
  } else {
    boot();
  }
})();
