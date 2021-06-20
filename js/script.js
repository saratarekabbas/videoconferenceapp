jQuery(document).ready(function ($) {
  // Nav Buttons clicking
  $('.nav li').click(function () {
    $(this).addClass('active').siblings('.active').removeClass('active');
  });

  // logout conf
  $('#logout-btn').click(function () {
    if (confirm('Are you sure you want to logout?')) {
      $('#logout-btn').attr("href", "logout.php")
    } else {
      return false;
    }
  });

  //mic src
  // const micOn = 'assets/icons/mic-on.png';
  // const micOff = 'assets/icons/mic-off.png';
  //video src
  // const videoOn = 'assets/icons/video-on.png';
  // const videoOff = 'assets/icons/video-off.png';
  //share src
  // const shareOn = 'assets/icons/share-on.png';
  // const shareOff = 'assets/icons/share-off.png';

  // toggle
  // $('.mic-button').on('click', toggleMic);
  // $('.video-button').on('click', toggleVideo);
  // $('.share-button').on('click', toggleShare);

  //leave conference
  // $('.leave-button').on('click', leave);

  //mic function
  // function toggleMic() {
  //   const current = $('#change-image-mic').attr('src');
  //   $('#change-image-mic').attr('src', current === micOn ? micOff : micOn);
  // }
  //video function
  // function toggleVideo() {
  //   const current = $('#change-image-video').attr('src');
  //   $('#change-image-video').attr('src', current === videoOn ? videoOff : videoOn);
  // }
  //share function
  // function toggleShare() {
  //   const current = $('#change-image-share').attr('src');
  //   $('#change-image-share').attr('src', current === shareOn ? shareOff : shareOn);
  // }
  //leave conference function
  // function leave() {
  //   confirm('Are you sure you want to leave the conference?');
  // }
});