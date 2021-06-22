<!-- Contains REG & LOGIN -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- Style Sheets Sources -->
    <link rel="stylesheet" href="css/registration.css">

    <title>Video Conference</title>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="registration.php" method="post">
                <h1>Sign up</h1>
                <input type="text" name="username" placeholder="Username" />
                <input type="text" name="name" placeholder="Full Name" />
                <input type="password" name="password" placeholder="Password" />
                <!-- <input type="file" name="avatar" id="avatar"> -->
                <!-- <form action="upload.php" method="post" enctype="multipart/form-data"> -->
                    <!-- <span>Avatar Image</span> -->
                    <!-- <input type="file" name="fileToUpload" id="fileToUpload"> -->
                    <!-- <input type="submit" value="Upload Image" name="submit"> -->
                <!-- </form> -->
                <button type="submit">Sign Up</button>
            </form>
        </div>

        <div class="form-container sign-in-container">
            <form action="validation.php" method="post">
                <h1>Sign in</h1>
                <input type="text" name="username" placeholder="Username" required />
                <input type="password" name="password" placeholder="Password" required />
                <button type="submit">Sign In</button>
            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button type="submit" class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    <script src="js/registration.js"></script>
    <!-- Getting user data -->
<script>
        $(function () {
            $.ajax({
                url: "https://utmdarkmoon.tk/test/video2/RESTAPI/RestController.php?view=all",
                method: "GET",
                encode: true,
                processData: false,
                headers: {
                    'Content-Type': "application/json"
                },
                success: function (bannerList) {

                    console.log(bannerList);

                    var bannerFormContent = ""
                    var indicators = ""
                    var slides = ""

                    $.each(bannerList, function (index, value) {

                        bannerFormContent += '<div class="row">' +
                            '<div>' +
                            '<div style="margin-top: 30px">' +
                            '<p>Edit details for this banner</p>' +
                            '<div class="input-group input-group-sm mb-3">' +
                            '<div class="input-group-prepend">' +
                            '<span class="input-group-text" id="inputGroup-sizing-sm">Image URL</span>' +
                            '</div>' +
                            '<input id="edit_imageURL_' + value.id + '" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="' + value.imageURL + '">' +
                            '</div>' +
                            '<div class="input-group input-group-sm mb-3">' +
                            '<div class="input-group-prepend">' +
                            '<span class="input-group-text" id="inputGroup-sizing-sm">Banner Title</span>' +
                            '</div>' +
                            '<input id="edit_title_' + value.id + '" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="' + value.title + '">' +
                            '</div>' +
                            '<div class="input-group input-group-sm mb-3">' +
                            '<div class="input-group-prepend">' +
                            '<span class="input-group-text" id="inputGroup-sizing-sm">Banner Description</span>' +
                            '</div>' +
                            '<input id="edit_description_' + value.id + '" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="' + value.description + '">' +
                            '</div>' +
                            '<button type="button" class="btn-sm btn-primary" onclick="editBanner(' + value.id + ')">Update</button>' +
                            '<button type="button" class="btn-sm btn-danger ml-2" onclick="deleteBanner(' + value.id + ')">Delete</button>' +
                            '</div>' +
                            '</div>' +
                            '</div>'

                        if (index == 0) {
                            indicators += '<li data-target="#demo" data-slide-to="0" class="active"></li>'
                        } else {
                            indicators += '<li data-target="#demo" data-slide-to="' + index + '" class="active"></li>'
                        }

                        var activeText = (index == 0) ? 'active' : ''

                        slides += '<div class="carousel-item ' + activeText + '">' +
                            '<img id="img' + value.id + '" src="' + value.imageURL + '" alt="' + value.title + '" width="100%">' +
                            '<div class="carousel-caption">' +
                            '<h3 style="color: white;">' + value.title + '</h3>' +
                            '<p style="color: white;">' + value.description + '</p>' +
                            '</div>' +
                            '</div>'
                    });

                    var bannerContent = '<div id="demo" class="carousel slide" data-ride="carousel">' +
                        '<ul class="carousel-indicators">' +
                        indicators +
                        '</ul>' +
                        '<div class="carousel-inner">' +
                        slides +
                        '</div>' +
                        '<a class="carousel-control-prev" href="#demo" data-slide="prev">' +
                        '<span class="carousel-control-prev-icon"></span>' +
                        '</a>' +
                        '<a class="carousel-control-next" href="#demo" data-slide="next">' +
                        '<span class="carousel-control-next-icon"></span>' +
                        '</a>' +
                        '</div>';

                    $("#myBannerForm").append(bannerFormContent)
                    $("#myCarousel").append(bannerContent)
                },
                error: err => console.error(err)
            });
        })

        function addBanner() {
            var datas = {
                "imageURL": $('#add_imageURL').val(),
                "title": $('#add_title').val(),
                "description": $('#add_description').val()
            };

            $.ajax({
                url: "https://utmdarkmoon.tk/test/banner/api/RestController.php?view=create",
                type: "POST",
                data: datas,
                dataType: "json",
                success: function (data, status, xhr) {
                    alert("Banner added successfully");
                    location.reload()
                },
                error: function (data, status, xhr) {
                    alert(xhr)
                }
            })

        }

        function editBanner(id) {
            var datas = {
                "id": id,
                "imageURL": $("#edit_imageURL_" + id).val(),
                "title": $("#edit_title_" + id).val(),
                "description": $("#edit_description_" + id).val()
            };

            $.ajax({
                type: "POST",
                url: "https://utmdarkmoon.tk/test/banner/api/RestController.php?view=update",
                data: datas,
                dataType: "json",
                success: function (data, status, xhr) {
                    alert("Banner updated successful");
                    location.reload()
                },
                error: function (data, status, xhr) {
                    alert(xhr)
                }
            });
        }

        function deleteBanner(id) {
            var datas = {
                "id": id
            };

            $.ajax({
                type: "POST",
                url: "https://utmdarkmoon.tk/test/banner/api/RestController.php?view=delete",
                data: datas,
                dataType: "json",
                success: function (data, status, xhr) {
                    alert("Banner deleted successfully")
                    location.reload()
                },
                error: function (data, status, xhr) {
                    alert(xhr)
                }
            })
        }
    </script>
</body>

</html>