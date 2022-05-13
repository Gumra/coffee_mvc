<?php $currentUser=array_key_first($_SESSION);?>
<div class="container-fluid">
    <form action="/settings" method="post" enctype="multipart/form-data">
        <div class="row g-3">
            <div class="col-md-3">
                <label for="inputLastName" class="form-label">Фамилия</label>
                <input name="lastName" type="text" class="form-control" id="inputLastName" value="<?=$_SESSION[$currentUser][0]['lastName']?>">
            </div>
            <div class="col-md-3">
                <label for="inputFirstName" class="form-label">Имя</label>
                <input name="firstName" type="text" class="form-control" id="inputFirstName" value="<?=$_SESSION[$currentUser][0]['firstName']?>">
            </div>
        </div>
        <br>
        <div class="row g-3">
            <div class="col-md-6">
                <label for="inputEmail" class="form-label">Почта</label>
                <input name="email" type="text" class="form-control" id="inputEmail" value="<?=$_SESSION[$currentUser][0]['email']?>">
            </div>
        </div>
        <br>
        <div class="row g-3">
            <div class="col-md-3">
                <label class="form-label">Фотография</label>
                <img src="/application/public/materials/profilesImage/<?=$_SESSION[$currentUser][0]['id'].'.jpg'?>" width="150" height="150" style="margin-top: 10px; vertical-align: text-top">
            </div>
            <div class="col-md-3">
                <label for="inputImg" class="form-label">Изменить</label>
                <input name="img" type="file" class="form-control" id="inputImg">
            </div>
        </div>
        <br>
        <div class="row g-3">
            <div class="col-md-3">
                <label for="inputBirthday" class="form-label">Дата рождения</label>
                <input name="birthday" type="date" class="form-control" id="inputBirthday" value="<?=$_SESSION[$currentUser][0]['birthday']?>">
            </div>
            <div class="col-md-3">
                <label for="inputNumber" class="form-label">Телефон</label>
                <input name="phone" type="text" class="form-control" id="inputNumber" value="<?=$_SESSION[$currentUser][0]['phone']?>">
            </div>
        </div>
        <br>
        <div class="row g-3">
            <div class="col-md-6">
                <label for="inputAddress" class="form-label">Адрес</label>
                <input name="address" type="text" class="form-control" id="inputAddress" value="<?=$_SESSION[$currentUser][0]['address']?>">
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
</div>