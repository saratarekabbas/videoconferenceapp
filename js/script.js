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
      success: function (roomList) { //we don't want to do that..
        console.log(roomList);
      }
    });
  });
  //       var bannerFormContent = ""
  //       var indicators = ""
  //       var slides = ""

  //       $.each(roomList, function (index, value) {

  //         bannerFormContent += '<div class="row">' +
  //           '<div>' +
  //           '<div style="margin-top: 30px">' +
  //           '<p>Edit details for this banner</p>' +
  //           '<div class="input-group input-group-sm mb-3">' +
  //           '<div class="input-group-prepend">' +
  //           '<span class="input-group-text" id="inputGroup-sizing-sm">Image URL</span>' +
  //           '</div>' +
  //           '<input id="edit_imageURL_' + value.id + '" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="' + value.imageURL + '">' +
  //           '</div>' +
  //           '<div class="input-group input-group-sm mb-3">' +
  //           '<div class="input-group-prepend">' +
  //           '<span class="input-group-text" id="inputGroup-sizing-sm">Banner Title</span>' +
  //           '</div>' +
  //           '<input id="edit_title_' + value.id + '" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="' + value.title + '">' +
  //           '</div>' +
  //           '<div class="input-group input-group-sm mb-3">' +
  //           '<div class="input-group-prepend">' +
  //           '<span class="input-group-text" id="inputGroup-sizing-sm">Banner Description</span>' +
  //           '</div>' +
  //           '<input id="edit_description_' + value.id + '" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="' + value.description + '">' +
  //           '</div>' +
  //           '<button type="button" class="btn-sm btn-primary" onclick="editBanner(' + value.id + ')">Update</button>' +
  //           '<button type="button" class="btn-sm btn-danger ml-2" onclick="deleteBanner(' + value.id + ')">Delete</button>' +
  //           '</div>' +
  //           '</div>' +
  //           '</div>'

  //         if (index == 0) {
  //           indicators += '<li data-target="#demo" data-slide-to="0" class="active"></li>'
  //         } else {
  //           indicators += '<li data-target="#demo" data-slide-to="' + index + '" class="active"></li>'
  //         }

  //         var activeText = (index == 0) ? 'active' : ''

  //         slides += '<div class="carousel-item ' + activeText + '">' +
  //           '<img id="img' + value.id + '" src="' + value.imageURL + '" alt="' + value.title + '" width="100%">' +
  //           '<div class="carousel-caption">' +
  //           '<h3 style="color: white;">' + value.title + '</h3>' +
  //           '<p style="color: white;">' + value.description + '</p>' +
  //           '</div>' +
  //           '</div>'
  //       });

  //       var bannerContent = '<div id="demo" class="carousel slide" data-ride="carousel">' +
  //         '<ul class="carousel-indicators">' +
  //         indicators +
  //         '</ul>' +
  //         '<div class="carousel-inner">' +
  //         slides +
  //         '</div>' +
  //         '<a class="carousel-control-prev" href="#demo" data-slide="prev">' +
  //         '<span class="carousel-control-prev-icon"></span>' +
  //         '</a>' +
  //         '<a class="carousel-control-next" href="#demo" data-slide="next">' +
  //         '<span class="carousel-control-next-icon"></span>' +
  //         '</a>' +
  //         '</div>';

  //       $("#myBannerForm").append(bannerFormContent)
  //       $("#myCarousel").append(bannerContent)
  //     },
  //     error: err => console.error(err)
  //   });
  // })

  function addRoom() {
    var newRoom = {
      "name": $('#room-name').val(),
      "description": $('#room-description').val()
    };

    $.ajax({
      url: "https://utmdarkmoon.tk/test/video2/api/RestController.php?view=create",
      type: "POST",
      data: datas,
      dataType: "json",
      success: function (data, status, xhr) {
        var successfulRoom = document.createElement("div");
        successfulRoom.addClass("alert alert-success");
        successfulRoom.data("role", "alert");
        successfulRoom.textContent("The room was added successfully!");
        $("#alert-room-add").append(successfulRoom);

        alert("The room has been added successfully!");
        location.reload()
      },
      error: function (data, status, xhr) {
        var unsuccessfulRoom = document.createElement("div");
        unsuccessfulRoom.addClass("alert alert-danger");
        unsuccessfulRoom.data("role", "alert");
        unsuccessfulRoom.textContent("Sorry, the room was not added!");

        $("#alert-room-add").append(unsuccessfulRoom);

        alert(xhr)
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

});