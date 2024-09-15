<!DOCTYPE html>
<html lang="az">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Məlumatları</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        #profile-pic {
            display: block;
            margin-top: 10px;
        }

        #spinner {
            display: none;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<h1>Profil Məlumatları</h1>

<form id="profile-form" enctype="multipart/form-data">
    <div class="form-group">
        <label for="first-name">Ad:</label>
        <input type="text" id="first-name" name="first-name" required>
    </div>
    <div class="form-group">
        <label for="last-name">Soyad:</label>
        <input type="text" id="last-name" name="last-name" required>
    </div>
    <div class="form-group">
        <label for="phone">Telefon Nömrəsi:</label>
        <input type="text" id="phone" name="phone" required>
    </div>
    <div class="form-group">
        <label for="profile-picture">Profil Şəkili:</label>
        <input type="file" id="profile-picture" name="profile-picture" accept="image/*" required multiple>
        <img id="profile-pic" width="150"/>
    </div>
    <button type="submit">Məlumatı Saxla</button>
    <div id="spinner">Yüklənir...</div>
</form>

<script>
    $(document).ready(function () {
        $('#profile-picture').change(function () {
            const reader = new FileReader();
            reader.onload = function (e) {
                $('#profile-pic').attr('src', e.target.result);
            };
            reader.readAsDataURL(this.files[0]);
        });

        $('#profile-form').on('submit', function (event) {
            event.preventDefault();

            var formData = new FormData(this);

            $('#spinner').show();

            $.ajax({
                url: 'upload.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    alert(response);
                    $('#spinner').hide();
                },
                error: function () {
                    alert('Məlumat göndərilmədi, səhv baş verdi.');
                    $('#spinner').hide();
                }
            });
        });
    });
</script>

</body>
</html>
