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


  // ROOM
  ajax
  $(function () {
    $.ajax({
      url: "https://utmdarkmoon.tk/test/video2/api/RestController.php?view=all",
      method: "GET",
      encode: true,
      processData: false,
      headers: {
        'Content-Type': "application/json"
      },
      success: function (roomList) { //displaying the room list (display this in "ROOM" button/section not in home)
        console.log(roomList);

        var roomListContent = "";
        // var indicators 
        // var slides //malhash 3elaqa bel app beta3ti

        $.each(roomList, function (index, value) {
          // Magebnash seeret el members.. mesh 3arfa a-retrieve them ezayyy
          roomListContent +=
            '<!-- <h4 id="room"> <b>' + $name + '</b></h4>' +
            '<div class="panel-group">' +
            '+<div class="panel panel-default">' +
            '<div class="panel-heading">' +
            '<h4 class="panel-title">' +
            '<a data-toggle="collapse" href="#collapse1">Users</a>' +
            '</h4>' +
            '</div>' +
            '<div id="collapse1" class="panel-collapse collapse">' +
            ' <ul class="list-group">' +
            ' <li class="list-group-item">Sara Tarek</li> ' + //RETRIEVE ACTUAL USERS INSTEAD OF HARDCODED...
            ' <li class="list-group-item">Afifah Afifah</li>' +
            ' <li class="list-group-item">Syed Syed</li>' +
            ' <li class="list-group-item">Amir Amir</li>' +
            ' </ul>' +
            '</div>' +
            '</div>' +
            ' </div> '

          // 3and Syed..................
          //   if (index == 0) {
          //     indicators += '<li data-target="#demo" data-slide-to="0" class="active"></li>'
          // } else {
          //     indicators += '<li data-target="#demo" data-slide-to="' + index + '" class="active"></li>'
          // }

          // var activeText = (index == 0) ? 'active' : ''

          // slides += '<div class="carousel-item ' + activeText + '">' +
          //     '<img id="img' + value.id + '" src="' + value.imageURL + '" alt="' + value.title + '" width="100%">' +
          //     '<div class="carousel-caption">' +
          //     '<h3 style="color: white;">' + value.title + '</h3>' +
          //     '<p style="color: white;">' + value.description + '</p>' +
          //     '</div>' +
          //     '</div>'

        })
        $('#roomListContent').append(roomListContent);
      },
      error: err => console.error(err)
    });
  });


  function addRoom() {
    var newRoom = {
      "name": $('#room-name').val(),
      "description": $('#room-description').val()
    };

    $.ajax({
      url: "https://utmdarkmoon.tk/test/video2/api/RestController.php?view=create",
      type: "POST",
      data: newRoom,
      dataType: "json",
      success: function (data, status, xhr) {

        var alertRoomSuccessful = '<div class="alert alert-success" role="alert">The room was added successfully!</div>';
        $("#alert-room-add").append(alertRoomSuccessful);

        // alert("The room has been added successfully!");
        location.reload()
      },
      error: function (data, status, xhr) {
        
        var alertRoomUnsuccessful = '<div class="alert alert-danger" role="alert">Sorry, the room was not added due to error: ' + xhr +'</div>';
        $("#alert-room-add").append(alertRoomUnsuccessful);
        // alert(xhr)
      }
    })

  }

  // updating the profile data
  // function editBanner(id) {
  //   var datas = {
  //     "id": id,
  //     "imageURL": $("#edit_imageURL_" + id).val(),
  //     "title": $("#edit_title_" + id).val(),
  //     "description": $("#edit_description_" + id).val()
  //   };

  //   $.ajax({
  //     type: "POST",
  //     url: "https://utmdarkmoon.tk/test/banner/api/RestController.php?view=update",
  //     data: datas,
  //     dataType: "json",
  //     success: function (data, status, xhr) {
  //       alert("Banner updated successful");
  //       location.reload()
  //     },
  //     error: function (data, status, xhr) {
  //       alert(xhr)
  //     }
  //   });
  // }

  // function deleteBanner(id) {
  //   var datas = {
  //     "id": id
  //   };

  //   $.ajax({
  //     type: "POST",
  //     url: "https://utmdarkmoon.tk/test/banner/api/RestController.php?view=delete",
  //     data: datas,
  //     dataType: "json",
  //     success: function (data, status, xhr) {
  //       alert("Banner deleted successfully")
  //       location.reload()
  //     },
  //     error: function (data, status, xhr) {
  //       alert(xhr)
  //     }
  //   })
  // }







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