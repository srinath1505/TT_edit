<?php
$homeIntroVideo = 'assets/videos/logo-ani.mp4';
$homeIntroVideoVer = file_exists($homeIntroVideo) ? filemtime($homeIntroVideo) : '';
?>
<script>
(function () {
  try {
    if (
      sessionStorage.getItem("tt_home_intro_seen") === "1" ||
      window.matchMedia("(prefers-reduced-motion: reduce)").matches
    ) {
      document.documentElement.classList.add("home-intro-skip");
      return;
    }
    document.body.classList.add("home-intro-active");
  } catch (e) {}
})();
</script>
<div
  id="homeIntroSplash"
  class="home-intro-splash"
  role="dialog"
  aria-modal="true"
  aria-label="TraderTok introduction"
>
  <video
    class="home-intro-splash__video"
    id="homeIntroVideo"
    playsinline
    muted
    autoplay
    preload="auto"
  >
    <source
      src="<?php echo htmlspecialchars($homeIntroVideo . ($homeIntroVideoVer !== '' ? '?v=' . $homeIntroVideoVer : '')); ?>"
      type="video/mp4"
    >
  </video>
  <!-- <button type="button" class="home-intro-splash__skip" id="homeIntroSkip">
    Skip
  </button> -->
</div>
