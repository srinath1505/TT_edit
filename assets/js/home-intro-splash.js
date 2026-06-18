(function () {
  var SPLASH_ID = "homeIntroSplash";
  var VIDEO_ID = "homeIntroVideo";
  var SKIP_ID = "homeIntroSkip";
  var STORAGE_KEY = "tt_home_intro_seen";
  var MAX_DURATION_MS = 30000;

  function shouldSkipIntro() {
    try {
      if (sessionStorage.getItem(STORAGE_KEY) === "1") return true;
      if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
        return true;
      }
    } catch (e) {}
    return document.documentElement.classList.contains("home-intro-skip");
  }

  function dismissSplash(splash, body) {
    if (!splash || splash.dataset.dismissed === "1") return;
    splash.dataset.dismissed = "1";
    splash.classList.add("is-dismissed");
    body.classList.remove("home-intro-active");

    try {
      sessionStorage.setItem(STORAGE_KEY, "1");
    } catch (e) {}

    window.setTimeout(function () {
      splash.hidden = true;
      splash.setAttribute("aria-hidden", "true");
    }, 600);
  }

  function initHomeIntroSplash() {
    if (shouldSkipIntro()) return;

    var splash = document.getElementById(SPLASH_ID);
    var video = document.getElementById(VIDEO_ID);
    var skipBtn = document.getElementById(SKIP_ID);
    var body = document.body;

    if (!splash || !video || !body) return;

    splash.removeAttribute("aria-hidden");

    var dismissed = false;
    function finish() {
      if (dismissed) return;
      dismissed = true;
      dismissSplash(splash, body);
    }

    skipBtn?.addEventListener("click", finish);
    video.addEventListener("ended", finish);
    video.addEventListener("error", function () {
      window.setTimeout(finish, 400);
    });

    window.setTimeout(finish, MAX_DURATION_MS);

    var playPromise = video.play();
    if (playPromise && typeof playPromise.catch === "function") {
      playPromise.catch(function () {
        window.setTimeout(finish, 400);
      });
    }
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initHomeIntroSplash);
  } else {
    initHomeIntroSplash();
  }
})();
